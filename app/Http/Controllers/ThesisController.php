<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thesis;
use App\Models\Course;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Smalot\PdfParser\Parser;
use GuzzleHttp\Client;




class ThesisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $thesis = Thesis::where('user_id', auth()->id())
            ->get();

        // Fetch only active courses
        $courses = Course::where('course_status', 'active')->get();

        // Pass the data to the view
        return view('layouts.thesis.index', compact('thesis', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    /*    public function create()
    {
        $courses = Course::all();
        return view('layouts.students.thesis', compact('courses'));
    } */


    /*    public function store(Request $request)
    {

        $validated = $request->validate([
            'thesis_title' => 'required|string|max:255',
            'thesis_file' => 'required|file|mimes:pdf',
            'thesis_course' => 'required|string|max:255',
            'abstract' => 'required|string',
        ]);


        $validated['thesis_file'] = $request->file('thesis_file')->store('public/thesis');

        $validated['user_id'] = auth()->id();
        $thesis = Thesis::create($validated);


        $parser = new \Smalot\PdfParser\Parser();
        $pdfPath = storage_path('app/' . $validated['thesis_file']);

        try {
            $pdf = $parser->parseFile($pdfPath);
            $text = $pdf->getText();
        } catch (\Exception $e) {
            Log::error('PDF parsing error for thesis ID ' . $thesis->id . ': ' . $e->getMessage());
            return redirect()->route('thesis.index')->with('error', 'There was an error processing the PDF.');
        }


        $tempFilePath = storage_path('app/temp_thesis.txt');
        file_put_contents($tempFilePath, $text);


        $command = escapeshellcmd("python C:/Users/User/pycharmProjects/plagiarizedChecker/ai_detector.py " . escapeshellarg($tempFilePath));
        $output = shell_exec($command . ' 2>&1');

        unlink($tempFilePath);


        if ($output === null || empty($output)) {
            Log::error('Error executing Python script for thesis ID ' . $thesis->id . ': Output is null or empty.');
            return redirect()->route('thesis.index')->with('error', 'There was an error processing your thesis.');
        }


        Log::info('Python script output for thesis ID ' . $thesis->id . ': ' . $output);

        $similarityResult = json_decode($output, true);


        Log::info('Similarity check result for thesis ID ' . $thesis->id, ['result' => $similarityResult]);


        $matchingTexts = [];
        $insightsText = '';
        $similarityDetails = '';


        $isPlagiarized = !empty($similarityResult['matching_texts']) ? 1 : 0; // Set to 1 if AI content detected


        if ($isPlagiarized) {
            $matchingTexts = $similarityResult['matching_texts'];
            $insightsText = "AI Content Detected.";
            $similarityScores = $similarityResult['similarities'] ?? [];
            $similarityDetails = "Similarity Scores: " . implode(", ", $similarityScores);
        } else {
            $insightsText = "No AI Content Detected.";
            $similarityDetails = "No matching documents.";
        }


        $thesis->update([
            'similarity' => json_encode($similarityResult),
            'plagiarized' => $isPlagiarized
        ]);

        $thesisFilePath = asset('storage/thesis/' . basename($validated['thesis_file']));

        session()->flash('matchingTexts', $matchingTexts);


        $csvFilePath = 'C:/Users/User/pycharmProjects/plagiarizedChecker/thesis-folder-csv/thesis_data.csv';
        $fileHandle = fopen($csvFilePath, 'a');

        if ($fileHandle !== false) {
            if (filesize($csvFilePath) === 0) {
                fputcsv($fileHandle, ['Thesis Title', 'User ID', 'Course', 'Abstract', 'Similarity', 'Plagiarized']);
            }

            $similarityData = json_encode($similarityResult);
            $csvData = [
                $validated['thesis_title'],
                $validated['user_id'],
                $validated['thesis_course'],
                $validated['abstract'],
                $similarityData,
                $isPlagiarized,
            ];

            fputcsv($fileHandle, $csvData);
            fclose($fileHandle);
        } else {
            Log::error('Could not open CSV file for writing.');
        }

        return redirect()->route('thesis.index')->with([
            'success' => 'Thesis uploaded successfully.',
            'insightsText' => $insightsText,
            'similarityDetails' => $similarityDetails,
            'thesisFilePath' => $thesisFilePath,
        ]);
    } */

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'thesis_title' => 'required|string|max:255',
            'thesis_file' => 'required|file|mimes:pdf',
            'thesis_course' => 'required|string|max:255',
            'abstract' => 'required|string',
        ]);

        // Store the uploaded file
        $validated['thesis_file'] = $request->file('thesis_file')->store('public/thesis');
        $validated['user_id'] = auth()->id();
        $thesis = Thesis::create($validated);

        // Parse the PDF
        $parser = new \Smalot\PdfParser\Parser();
        $pdfPath = storage_path('app/' . $validated['thesis_file']);
        try {
            $pdf = $parser->parseFile($pdfPath);
            $text = $pdf->getText();
        } catch (\Exception $e) {
            Log::error('PDF parsing error for thesis ID ' . $thesis->id . ': ' . $e->getMessage());
            return redirect()->route('thesis.index')->with('error', 'There was an error processing the PDF.');
        }


        $tempFilePath = storage_path('app/temp_thesis.txt');
        file_put_contents($tempFilePath, $text);


        $command = escapeshellcmd("python C:/Users/User/pycharmProjects/plagiarizedChecker/ai_detector.py " . escapeshellarg($tempFilePath));
        $output = shell_exec($command . ' 2>&1');
        unlink($tempFilePath); // Clean up temporary file

        if ($output === null || empty($output)) {
            Log::error('Error executing Python script for thesis ID ' . $thesis->id . ': Output is null or empty.');
            return redirect()->route('thesis.index')->with('error', 'There was an error processing your thesis.');
        }

        Log::info('Python script output for thesis ID ' . $thesis->id . ': ' . $output);

        $similarityResult = json_decode($output, true);
        Log::info('Similarity check result for thesis ID ' . $thesis->id, ['result' => $similarityResult]);


        $similarityScores = $similarityResult['similarities'] ?? [];
        $matchingTexts = $similarityResult['matching_texts'] ?? [];
        $isPlagiarized = !empty($matchingTexts) ? 1 : 0;


        $aiContentPercentage = 0;
        if (count($similarityScores) > 0) {
            $aiContentPercentage = round((array_sum($similarityScores) / count($similarityScores)) * 100, 2);
        }


        $thesis->update([
            'similarity' => json_encode($similarityResult),
            'plagiarized' => $isPlagiarized
        ]);


        $csvFilePath = 'C:/Users/User/pycharmProjects/plagiarizedChecker/thesis-folder-csv/thesis_data.csv';
        $fileHandle = fopen($csvFilePath, 'a');
        if ($fileHandle !== false) {
            if (filesize($csvFilePath) === 0) {
                fputcsv($fileHandle, ['Thesis Title', 'User ID', 'Course', 'Abstract', 'Similarity', 'Plagiarized']);
            }
            $csvData = [
                $validated['thesis_title'],
                $validated['user_id'],
                $validated['thesis_course'],
                $validated['abstract'],
                json_encode($similarityResult),
                $isPlagiarized
            ];
            fputcsv($fileHandle, $csvData);
            fclose($fileHandle);
        } else {
            Log::error('Could not open CSV file for writing.');
        }


        return redirect()->route('thesis.index')->with([
            'success' => 'Thesis uploaded successfully.',
            'insightsText' => $isPlagiarized ? "AI Content Detected" : "No AI Content Detected",
            'similarityDetails' => "AI Content Percentage: " . $aiContentPercentage . "%",
            'aiContentPercentage' => $aiContentPercentage,
            'matchingTexts' => $matchingTexts,
            'thesisFilePath' => asset('storage/thesis/' . basename($validated['thesis_file']))
        ]);
    }


    /*    private function checkAiContentFromPdf($filePath, $thesisId)
    {
        $client = new \GuzzleHttp\Client();

        // Use the PDF Parser to extract text from the file
        $parser = new Parser();
        $pdf = $parser->parseFile($filePath);
        $text = $pdf->getText();

        // Check if the extracted text length meets the API requirements
        if (strlen($text) < 50 || strlen($text) > 10000) {
            Log::info('AI content check skipped for thesis ID ' . $thesisId . ': Extracted text length is not within the required range.');
            return json_encode(['data' => ['isAi' => false, 'nlp' => []]]);
        }

        try {
            $response = $client->request('POST', 'https://chatgpt-detector-api.p.rapidapi.com/aiContentCheck', [
                'body' => json_encode(['text' => $text]),
                'headers' => [
                    'Content-Type' => 'application/json',
                    'x-rapidapi-host' => 'chatgpt-detector-api.p.rapidapi.com',
                    'x-rapidapi-key' => env('RAPID_API_GPT'),
                ],
            ]);


            $apiResponse = json_decode($response->getBody(), true);
            Log::info('AI Content check response for thesis ID ' . $thesisId, $apiResponse);


            return json_encode($apiResponse);
        } catch (\Exception $e) {
            Log::error('Error during AI content check: ' . $e->getMessage());

            return json_encode(['data' => ['isAi' => false, 'nlp' => []]]);
        }
    } */



    public function updateStatus(Request $request)
    {
        $thesis = Thesis::find($request->thesis_id);

        if ($thesis) {
            $thesis->status = $request->status;
            $thesis->save();

            return response()->json(['success' => true, 'status' => $thesis->status]);
        }

        return response()->json(['success' => false, 'message' => 'Thesis not found']);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $thesis = Thesis::with('user')->findOrFail($id);
        return response()->json([
            'thesis_title' => $thesis->thesis_title,
            'user' => $thesis->user,
            'thesis_course' => $thesis->thesis_course,
            'status' => $thesis->status,
            'thesis_file_path' => asset('storage/thesis/' . basename($thesis->thesis_file)), // Adjust as needed
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'edit_thesis_title' => 'required|string|max:255',
                'edit_thesis_file' => 'nullable|file|mimes:pdf',
                'edit_thesis_course' => 'required|string',
                'edit_thesis_abstract' => 'required|string',
            ],
            [
                'edit_thesis_file.mimes' => 'The edit thesis file must be a file of type: pdf.',
            ]
        );

        $thesis = Thesis::findOrFail($id);
        Log::info('Thesis Retrieved: ', $thesis->toArray()); // Log thesis data

        // Update thesis details
        $thesis->thesis_title = $request->edit_thesis_title;
        $thesis->thesis_course = $request->edit_thesis_course;
        $thesis->abstract = $request->edit_thesis_abstract;

        // Check if a new file is uploaded
        if ($request->hasFile('edit_thesis_file')) {
            // Store the new thesis file in 'public/thesis' directory
            $path = $request->file('edit_thesis_file')->store('public/thesis'); // Specify the 'public' disk
            $thesis->thesis_file = $path; // Update the file path in the thesis record
            Log::info('File stored at: ' . $path); // Log the file storage path
        }

        Log::info('Saving Thesis: ', $thesis->toArray());

        try {
            $thesis->save();
            Log::info('Thesis updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating thesis: ' . $e->getMessage());
            return redirect()->route('thesis.index')->with('error', 'Failed to update thesis.');
        }

        return redirect()->route('thesis.index')->with('success', 'Thesis updated successfully!');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thesis $thesis)
    {
        try {
            Log::info('Deleting Thesis ID: ' . $thesis->id);
            $thesis->delete();
            return redirect()->route('thesis.index')->with('delete_success', 'Thesis deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting thesis: ' . $e->getMessage());
            return redirect()->route('thesis.index')->with('delete_error', 'Failed to delete thesis.');
        }
    }
}

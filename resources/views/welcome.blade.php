<!--
Template Name: Tailone - Tailwind One Page Template
Author: Aribudin
Website: https://www.tailwindtemplate.net
Contact: support@tailwindtemplate.net
Purchase: https://themes.tailwindtemplate.net/tailone
License: You must have a valid license from official store to legally use the theme for your project.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title  -->
    <title>Archiving System </title>
    <meta name="description" content="archives">
    <meta property="og:image" content="img/landing-background2.png" />
    <!-- Development css -->
    <link rel="stylesheet" href="src/css/style.css">

    <!-- Production css -->
    <!-- <link rel="stylesheet" href="dist/css/style.css"> -->

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


    <!-- Favicon  -->
    <link rel="icon" type="image/png" href="{{ asset('img/landing-background2.png') }}" />
</head>

<body class="text-gray-700">
    <!-- preloader -->
    <div class="preloader loaded-success fixed inset-0 z-50 bg-gray-50">
        <div class="absolute left-1/2 top-1/2 transform -translate-y-1/2">
            <div class="relative mx-auto my-12">
                <div class="inline-block">
                    <svg class="animate-spin h-8 w-8 text-blue-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== { HEADER }==========  -->
    <header class="fixed top-0 left-0 right-0 z-40">
        <nav class="main-nav">
            <div class="container xl:max-w-6xl mx-auto px-4">
                <div class="lg:flex lg:justify-between">
                    <div class="flex justify-between">
                        <div class="mx-w-10 text-4xl font-bold capitalize text-gray-900 flex items-center">Archives</div>
                        <!-- mobile nav -->
                        <div class="flex flex-row items-center py-4 lg:py-0">
                            <div class="relative text-gray-900 hover:text-black block lg:hidden">
                                <button type="button" class="menu-mobile block py-3 px-6 border-b-2 border-transparent">
                                    <span class="sr-only">Mobile menu</span>
                                    <svg class="open h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="close bi bi-x-lg h-8 w-8" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z" />
                                        <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row">
                        <!-- nav menu -->
                        <ul class="navbar bg-white lg:bg-transparent w-full hidden text-center lg:text-left lg:flex lg:flex-row text-gray-900 text-sm items-center font-bold">
                            <li class="relative hover:text-black">
                                <a class="active block py-3 lg:py-7 px-6 border-b-2 border-transparent" href="#hero">Home</a>
                            </li>
                            <li class="relative hover:text-black">
                                <a class="block py-3 lg:py-7 px-6 border-b-2 border-transparent" href="#thesis">Thesis</a>
                            </li>
                            <li class="relative hover:text-black">
                                <a class="block py-3 lg:py-7 px-6 border-b-2 border-transparent" href="#about">About</a>
                            </li>
                            <li class="relative hover:text-black">
                                <a class="block py-3 lg:py-7 px-6 border-b-2 border-transparent" href="#contact">Contact</a>
                            </li>
                            <li class="relative hover:text-black">
                                <a class="block py-3 lg:py-7 px-6 border-b-2 border-transparent" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="relative hover:text-black">
                                <a class="block py-3 lg:py-7 px-6 border-b-2 border-transparent" href="{{ route('register') }}">Register</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header><!-- end header -->

    <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="cookieModal">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Modal Panel -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <!-- Close Button -->
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                Cookie Policy
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    We use cookies to improve your browsing experience. Continuing to use this site means you agree & accept of our <a href="#" class="hover:underline text-gray-900 text-sm hover:text-green-700">Cookie Policy & Privacy</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm" onclick="hideCookieModal()">
                        Got it!
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        /*     function showCookieModal() {
            document.getElementById('cookieModal').classList.remove('hidden');
        }

      
        function hideCookieModal() {
            document.getElementById('cookieModal').classList.add('hidden');
        }

        window.onload = function() {
            showCookieModal();
        }; */

        function showCookieModal() {
            document.getElementById('cookieModal').classList.remove('hidden');
        }


        function hideCookieModal() {
            document.getElementById('cookieModal').classList.add('hidden');
            // set ug flag sa localstorage
            localStorage.setItem('cookieAcknowledged', 'true');
        }

        //check user if agree to cookie policy
        window.onload = function() {
            if (!localStorage.getItem('cookieAcknowledged')) {
                showCookieModal();
            }
        };
    </script>


    <!-- =========={ MAIN }==========  -->
    <main id="content">
        <!-- hero start -->
        <div id="hero" class="section relative z-0 py-16 md:pt-32 md:pb-20 bg-gray-50">
            <div class="container xl:max-w-6xl mx-auto px-4">
                <div class="flex flex-wrap flex-row -mx-4 justify-center">
                    <!-- content -->
                    <div class="flex-shrink max-w-full px-4 sm:px-12 lg:px-18 w-full sm:w-9/12 lg:w-1/2 self-center">
                        <img src="img/landing-background2.png" class="w-full max-w-full h-auto" alt="creative agency">

                    </div><!-- end content -->

                    <!-- text -->
                    <div class="flex-shrink max-w-full px-4 w-full md:w-9/12 lg:w-1/2 self-center lg:pr-12">
                        <div class="text-center lg:text-left mt-6 lg:mt-0">
                            <div class="mb-12">
                                <h1 class="text-4xl leading-normal text-black font-bold mb-4">
                                    Archiving Today for <br>
                                    <span data-toggle="typed" data-options="{&quot;strings&quot;: [&quot;Tomorrow's Discoveries&quot;]}"></span>
                                </h1>

                                <p class="text-gray-500 leading-relaxed font-light text-xl mx-auto pb-2"> A Secured Online Thesis Achiving System with AI Plagiarism Checker using Indexing Algorithm with Content-Based Searching.</p>
                            </div>
                            <a class="py-2.5 px-10 inline-block text-center leading-normal text-gray-900 bg-white border-b border-gray-100 hover:text-black hover:ring-0 focus:outline-none focus:ring-0 mr-4" href="#thesis">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block mr-1" width="1.5rem" height="1.5rem" fill="currentColor" viewBox="0 0 512 512">
                                    <path d="M304,384V360c0-29,31.54-56.43,52-76,28.84-27.57,44-64.61,44-108,0-80-63.73-144-144-144A143.6,143.6,0,0,0,112,176c0,41.84,15.81,81.39,44,108,20.35,19.21,52,46.7,52,76v24" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" />
                                    <line x1="224" y1="480" x2="288" y2="480" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" />
                                    <line x1="208" y1="432" x2="304" y2="432" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" />
                                    <line x1="256" y1="384" x2="256" y2="256" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" />
                                    <path d="M294,240s-21.51,16-38,16-38-16-38-16" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" />
                                </svg>
                                Thesis
                            </a>

                            <a class="py-2.5 px-10 inline-block text-center leading-normal text-gray-100 bg-black border-b border-gray-800 hover:text-white hover:ring-0 focus:outline-none focus:ring-0" target="_blank" href="mailto:archive@gmail.com">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" class="inline-block mr-1" fill="currentColor" viewBox="0 0 512 512">
                                    <rect x="48" y="96" width="416" height="320" rx="40" ry="40" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" />
                                    <polyline points="112 160 256 272 400 160" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" />
                                </svg>
                                Email us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end Hero -->

        <!-- start services -->
        <div id="thesis" class="section relative pt-20 pb-8 md:pt-16 md:pb-0 bg-white">
            <div class="container xl:max-w-6xl mx-auto px-4">
                <header class="text-center mx-auto mb-12 lg:px-20">
                    <h2 class="text-2xl leading-normal mb-2 font-bold text-black">Thesis</h2>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="margin: 0 auto;height: 35px;" xml:space="preserve">
                        <circle cx="50.1" cy="30.4" r="5" class="stroke-primary" style="fill: transparent;stroke-width: 2;stroke-miterlimit: 10;"></circle>
                        <line x1="55.1" y1="30.4" x2="100" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                        <line x1="45.1" y1="30.4" x2="0" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                    </svg>
                    <p class="text-gray-500 leading-relaxed font-light text-xl mx-auto pb-2">Emphasizes the role of your system in preserving academic work.</p>
                </header><!-- End heading -->

                <!-- row -->
                <div class="flex flex-wrap flex-row -mx-4 text-center">
                    @foreach ($thesis as $thesis_data)
                    @if ($thesis_data->status !== 'pending' && $thesis_data->status !== 'declined')
                    <div class="w-full md:w-1/3 px-4 mb-8">
                        <div class="bg-white shadow-md rounded-lg p-6 flex flex-col h-full">
                            <div class="flex-grow">
                                <h3 class="text-lg font-bold text-black mb-2">{{ $thesis_data->thesis_title }}</h3>
                                <p class="text-gray-600 mb-4">Abstract: {{ $thesis_data->abstract }}</p>
                            </div>
                            <iframe src="{{ asset('storage/thesis/' . basename($thesis_data->thesis_file)) }}" class="w-full h-64 border border-gray-300" style="overflow: auto;" allowfullscreen></iframe>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div><!-- end row -->
            </div>
        </div>



        <div id="events" class="section relative z-0 py-12 md:py-16 bg-white">
            <div class="container xl:max-w-6xl mx-auto px-4">
                <!-- Heading start -->
                <header class="text-center mx-auto mb-12 lg:px-20">
                    <h2 class="text-2xl leading-normal mb-2 font-bold text-black">Contact</h2>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="margin: 0 auto;height: 35px;" xml:space="preserve">
                        <circle cx="50.1" cy="30.4" r="5" class="stroke-primary" style="fill: transparent;stroke-width: 2;stroke-miterlimit: 10;"></circle>
                        <line x1="55.1" y1="30.4" x2="100" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                        <line x1="45.1" y1="30.4" x2="0" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                    </svg>
                    <p class="text-gray-500 leading-relaxed font-light text-xl mx-auto pb-2">
                        Get in touch with us for any inquiries, support, or collaboration opportunities.</p>
                </header><!-- End heading -->
            </div>

            <div class="flex flex-wrap flex-row">

            </div>

        </div>


        <div id="clients" class="section relative py-8 bg-white dark:bg-gray-800">
            <div class="container xl:max-w-6xl mx-auto px-4">
                <div class="lex flex-wrap flex-row -mx-4 justify-center">
                    <div class="w-full px-4">

                        <div id="post-carousel" class="navslider-hover splide post-carousel">
                            <div class="splide__track">
                                <div class="splide__list grayscale">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team start -->
        <div id="team" class="section relative pt-20 pb-8 md:pt-16 bg-white dark:bg-gray-800">
            <div class="container xl:max-w-6xl mx-auto px-4">
                <!-- section header -->
                <header class="text-center mx-auto mb-12">
                    <h2 class="text-2xl leading-normal mb-2 font-bold text-gray-800 dark:text-gray-100"><span class="font-light">Our</span> Team</h2>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="margin: 0 auto;height: 35px;" xml:space="preserve">
                        <circle cx="50.1" cy="30.4" r="5" class="stroke-primary" style="fill: transparent;stroke-width: 2;stroke-miterlimit: 10;"></circle>
                        <line x1="55.1" y1="30.4" x2="100" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                        <line x1="45.1" y1="30.4" x2="0" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                    </svg>
                </header><!-- end section header -->

                <!-- row -->
                <div class="flex flex-wrap flex-row -mx-4 justify-center">
                    <div class="flex-shrink max-w-full px-4 w-2/3 sm:w-1/2 md:w-5/12 lg:w-1/4 xl:px-6">
                        <div class="relative overflow-hidden bg-white dark:bg-gray-800 mb-12 hover-grayscale-0 wow fadeInUp" data-wow-duration="1s">
                            <!-- team block -->
                            <div class="relative overflow-hidden px-6">
                                <img src="src/img/dummy/aliah.png" class="max-w-full h-15 mx-auto rounded-full bg-gray-50 grayscale" alt="title image">
                            </div>
                            <div class="pt-6 text-center">
                                <p class="text-lg leading-normal font-bold">Aliah Tobongbanua</p>
                                <p class="text-gray-500 leading-relaxed font-light">Hipster</p>
                                <!-- social icon -->
                                <div class="mt-2 mb-5 space-x-2">
                                    <a class="hover:text-blue-700" aria-label="Twitter link" href="#">
                                        <!-- <i class="fab fa-twitter text-twitter"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="1rem" height="1rem" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z"></path>
                                        </svg>
                                    </a>
                                    <a class="hover:text-blue-700" aria-label="Facebook link" href="#">
                                        <!-- <i class="fab fa-facebook text-facebook"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="1rem" height="1rem" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z"></path>
                                        </svg>
                                    </a>
                                    <a class="hover:text-blue-700" aria-label="Instagram link" href="#">
                                        <!-- <i class="fab fa-instagram text-instagram"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="1rem" height="1rem" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M349.33,69.33a93.62,93.62,0,0,1,93.34,93.34V349.33a93.62,93.62,0,0,1-93.34,93.34H162.67a93.62,93.62,0,0,1-93.34-93.34V162.67a93.62,93.62,0,0,1,93.34-93.34H349.33m0-37.33H162.67C90.8,32,32,90.8,32,162.67V349.33C32,421.2,90.8,480,162.67,480H349.33C421.2,480,480,421.2,480,349.33V162.67C480,90.8,421.2,32,349.33,32Z"></path>
                                            <path fill="currentColor" d="M377.33,162.67a28,28,0,1,1,28-28A27.94,27.94,0,0,1,377.33,162.67Z"></path>
                                            <path fill="currentColor" d="M256,181.33A74.67,74.67,0,1,1,181.33,256,74.75,74.75,0,0,1,256,181.33M256,144A112,112,0,1,0,368,256,112,112,0,0,0,256,144Z"></path>
                                        </svg>
                                    </a>
                                    <a class="hover:text-blue-700" aria-label="Linkedin link" href="#">
                                        <!-- <i class="fab fa-linkedin text-linkedin"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="1rem" height="1rem" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M444.17,32H70.28C49.85,32,32,46.7,32,66.89V441.61C32,461.91,49.85,480,70.28,480H444.06C464.6,480,480,461.79,480,441.61V66.89C480.12,46.7,464.6,32,444.17,32ZM170.87,405.43H106.69V205.88h64.18ZM141,175.54h-.46c-20.54,0-33.84-15.29-33.84-34.43,0-19.49,13.65-34.42,34.65-34.42s33.85,14.82,34.31,34.42C175.65,160.25,162.35,175.54,141,175.54ZM405.43,405.43H341.25V296.32c0-26.14-9.34-44-32.56-44-17.74,0-28.24,12-32.91,23.69-1.75,4.2-2.22,9.92-2.22,15.76V405.43H209.38V205.88h64.18v27.77c9.34-13.3,23.93-32.44,57.88-32.44,42.13,0,74,27.77,74,87.64Z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div><!-- end team block -->
                    </div>

                    <div class="flex-shrink max-w-full px-4 w-2/3 sm:w-1/2 md:w-5/12 lg:w-1/4 xl:px-6">
                        <!-- team block -->
                        <div class="relative overflow-hidden bg-white dark:bg-gray-800 mb-12 hover-grayscale-0 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                            <div class="relative overflow-hidden px-6">
                                <img src="src/img/dummy/Norhadin.png" class="max-w-full h-auto mx-auto rounded-full bg-gray-50 grayscale" alt="title image">
                            </div>
                            <div class="pt-6 text-center">
                                <p class="text-lg leading-normal font-bold mb-1">Norhadin Ampatuan</p>
                                <p class="text-gray-500 leading-relaxed font-light">Hacker</p>
                                <!-- social icon -->
                                <div class="mt-2 mb-5 space-x-2">
                                    <a class="hover:text-blue-700" aria-label="Twitter link" href="#">
                                        <!-- <i class="fab fa-twitter text-twitter"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="1rem" height="1rem" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z"></path>
                                        </svg>
                                    </a>
                                    <a class="hover:text-blue-700" aria-label="Facebook link" href="#">
                                        <!-- <i class="fab fa-facebook text-facebook"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="1rem" height="1rem" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z"></path>
                                        </svg>
                                    </a>
                                    <a class="hover:text-blue-700" aria-label="Instagram link" href="#">
                                        <!-- <i class="fab fa-instagram text-instagram"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="1rem" height="1rem" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M349.33,69.33a93.62,93.62,0,0,1,93.34,93.34V349.33a93.62,93.62,0,0,1-93.34,93.34H162.67a93.62,93.62,0,0,1-93.34-93.34V162.67a93.62,93.62,0,0,1,93.34-93.34H349.33m0-37.33H162.67C90.8,32,32,90.8,32,162.67V349.33C32,421.2,90.8,480,162.67,480H349.33C421.2,480,480,421.2,480,349.33V162.67C480,90.8,421.2,32,349.33,32Z"></path>
                                            <path fill="currentColor" d="M377.33,162.67a28,28,0,1,1,28-28A27.94,27.94,0,0,1,377.33,162.67Z"></path>
                                            <path fill="currentColor" d="M256,181.33A74.67,74.67,0,1,1,181.33,256,74.75,74.75,0,0,1,256,181.33M256,144A112,112,0,1,0,368,256,112,112,0,0,0,256,144Z"></path>
                                        </svg>
                                    </a>
                                    <a class="hover:text-blue-700" aria-label="Linkedin link" href="#">
                                        <!-- <i class="fab fa-linkedin text-linkedin"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="1rem" height="1rem" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M444.17,32H70.28C49.85,32,32,46.7,32,66.89V441.61C32,461.91,49.85,480,70.28,480H444.06C464.6,480,480,461.79,480,441.61V66.89C480.12,46.7,464.6,32,444.17,32ZM170.87,405.43H106.69V205.88h64.18ZM141,175.54h-.46c-20.54,0-33.84-15.29-33.84-34.43,0-19.49,13.65-34.42,34.65-34.42s33.85,14.82,34.31,34.42C175.65,160.25,162.35,175.54,141,175.54ZM405.43,405.43H341.25V296.32c0-26.14-9.34-44-32.56-44-17.74,0-28.24,12-32.91,23.69-1.75,4.2-2.22,9.92-2.22,15.76V405.43H209.38V205.88h64.18v27.77c9.34-13.3,23.93-32.44,57.88-32.44,42.13,0,74,27.77,74,87.64Z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div><!-- end team block -->
                    </div>

                    <div class="flex-shrink max-w-full px-4 w-2/3 sm:w-1/2 md:w-5/12 lg:w-1/4 xl:px-6">
                        <!-- team block -->
                        <div class="relative overflow-hidden bg-white dark:bg-gray-800 mb-12 hover-grayscale-0 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                            <div class="relative overflow-hidden px-6">
                                <img src="src/img/dummy/patrick.png" class="max-w-full h-auto mx-auto rounded-full bg-gray-50 grayscale" alt="title image">
                            </div>
                            <div class="pt-6 text-center">
                                <p class="text-lg leading-normal font-bold mb-1">Patrick Estilong</p>
                                <p class="text-gray-500 leading-relaxed font-light">Hustler</p>
                                <!-- social icon -->
                                <div class="mt-2 mb-5 space-x-2">
                                    <a class="hover:text-blue-700" aria-label="Twitter link" href="#">
                                        <!-- <i class="fab fa-twitter text-twitter"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="1rem" height="1rem" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z"></path>
                                        </svg>
                                    </a>
                                    <a class="hover:text-blue-700" aria-label="Facebook link" href="#">
                                        <!-- <i class="fab fa-facebook text-facebook"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="1rem" height="1rem" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z"></path>
                                        </svg>
                                    </a>
                                    <a class="hover:text-blue-700" aria-label="Instagram link" href="#">
                                        <!-- <i class="fab fa-instagram text-instagram"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="1rem" height="1rem" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M349.33,69.33a93.62,93.62,0,0,1,93.34,93.34V349.33a93.62,93.62,0,0,1-93.34,93.34H162.67a93.62,93.62,0,0,1-93.34-93.34V162.67a93.62,93.62,0,0,1,93.34-93.34H349.33m0-37.33H162.67C90.8,32,32,90.8,32,162.67V349.33C32,421.2,90.8,480,162.67,480H349.33C421.2,480,480,421.2,480,349.33V162.67C480,90.8,421.2,32,349.33,32Z"></path>
                                            <path fill="currentColor" d="M377.33,162.67a28,28,0,1,1,28-28A27.94,27.94,0,0,1,377.33,162.67Z"></path>
                                            <path fill="currentColor" d="M256,181.33A74.67,74.67,0,1,1,181.33,256,74.75,74.75,0,0,1,256,181.33M256,144A112,112,0,1,0,368,256,112,112,0,0,0,256,144Z"></path>
                                        </svg>
                                    </a>
                                    <a class="hover:text-blue-700" aria-label="Linkedin link" href="#">
                                        <!-- <i class="fab fa-linkedin text-linkedin"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="1rem" height="1rem" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M444.17,32H70.28C49.85,32,32,46.7,32,66.89V441.61C32,461.91,49.85,480,70.28,480H444.06C464.6,480,480,461.79,480,441.61V66.89C480.12,46.7,464.6,32,444.17,32ZM170.87,405.43H106.69V205.88h64.18ZM141,175.54h-.46c-20.54,0-33.84-15.29-33.84-34.43,0-19.49,13.65-34.42,34.65-34.42s33.85,14.82,34.31,34.42C175.65,160.25,162.35,175.54,141,175.54ZM405.43,405.43H341.25V296.32c0-26.14-9.34-44-32.56-44-17.74,0-28.24,12-32.91,23.69-1.75,4.2-2.22,9.92-2.22,15.76V405.43H209.38V205.88h64.18v27.77c9.34-13.3,23.93-32.44,57.88-32.44,42.13,0,74,27.77,74,87.64Z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div><!-- end team block -->
                    </div>

                    <div class="flex-shrink max-w-full px-4 w-2/3 sm:w-1/2 md:w-5/12 lg:w-1/4 xl:px-6">
                        <!-- team block -->
                        <div class="relative overflow-hidden bg-white dark:bg-gray-800 mb-12 hover-grayscale-0 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="relative overflow-hidden px-6">
                                <img src="src/img/dummy/rein.png" class="max-w-full h-auto mx-auto rounded-full bg-gray-50 grayscale" alt="title image">
                            </div>
                            <div class="pt-6 text-center">
                                <p class="text-lg leading-normal font-bold mb-1">Reinnawhin Borja</p>
                                <p class="text-gray-500 leading-relaxed font-light">Project Manager</p>
                                <!-- social icon -->
                                <div class="mt-2 mb-5 space-x-2">
                                    <a class="hover:text-blue-700" aria-label="Twitter link" href="#">
                                        <!-- <i class="fab fa-twitter text-twitter"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="1rem" height="1rem" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z"></path>
                                        </svg>
                                    </a>
                                    <a class="hover:text-blue-700" aria-label="Facebook link" href="#">
                                        <!-- <i class="fab fa-facebook text-facebook"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="1rem" height="1rem" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z"></path>
                                        </svg>
                                    </a>
                                    <a class="hover:text-blue-700" aria-label="Instagram link" href="#">
                                        <!-- <i class="fab fa-instagram text-instagram"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="1rem" height="1rem" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M349.33,69.33a93.62,93.62,0,0,1,93.34,93.34V349.33a93.62,93.62,0,0,1-93.34,93.34H162.67a93.62,93.62,0,0,1-93.34-93.34V162.67a93.62,93.62,0,0,1,93.34-93.34H349.33m0-37.33H162.67C90.8,32,32,90.8,32,162.67V349.33C32,421.2,90.8,480,162.67,480H349.33C421.2,480,480,421.2,480,349.33V162.67C480,90.8,421.2,32,349.33,32Z"></path>
                                            <path fill="currentColor" d="M377.33,162.67a28,28,0,1,1,28-28A27.94,27.94,0,0,1,377.33,162.67Z"></path>
                                            <path fill="currentColor" d="M256,181.33A74.67,74.67,0,1,1,181.33,256,74.75,74.75,0,0,1,256,181.33M256,144A112,112,0,1,0,368,256,112,112,0,0,0,256,144Z"></path>
                                        </svg>
                                    </a>
                                    <a class="hover:text-blue-700" aria-label="Linkedin link" href="#">
                                        <!-- <i class="fab fa-linkedin text-linkedin"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="1rem" height="1rem" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M444.17,32H70.28C49.85,32,32,46.7,32,66.89V441.61C32,461.91,49.85,480,70.28,480H444.06C464.6,480,480,461.79,480,441.61V66.89C480.12,46.7,464.6,32,444.17,32ZM170.87,405.43H106.69V205.88h64.18ZM141,175.54h-.46c-20.54,0-33.84-15.29-33.84-34.43,0-19.49,13.65-34.42,34.65-34.42s33.85,14.82,34.31,34.42C175.65,160.25,162.35,175.54,141,175.54ZM405.43,405.43H341.25V296.32c0-26.14-9.34-44-32.56-44-17.74,0-28.24,12-32.91,23.69-1.75,4.2-2.22,9.92-2.22,15.76V405.43H209.38V205.88h64.18v27.77c9.34-13.3,23.93-32.44,57.88-32.44,42.13,0,74,27.77,74,87.64Z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div><!-- end team block -->
                    </div>
                </div><!-- end row -->
            </div>
        </div><!-- End Team-->

        <!-- contact start -->
        <div id="contact" class="section relative pb-20 bg-white dark:bg-gray-800">
            <div class="container xl:max-w-6xl mx-auto px-4">
                <div class="flex flex-wrap flex-row -mx-4 justify-center">
                    <div class="max-w-ful px-4 w-full lg:w-8/12">
                        <div class="bg-gray-50 border-b border-gray-100 w-full p-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <!-- section header -->
                            <header class="text-center mx-auto mb-12 lg:px-20">
                                <h2 class="text-2xl leading-normal mb-2 font-bold text-gray-800 dark:text-gray-100"><span class="font-light">Contact</span> Us</h2>
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="margin: 0 auto;height: 35px;" xml:space="preserve">
                                    <circle cx="50.1" cy="30.4" r="5" class="stroke-primary" style="fill: transparent;stroke-width: 2;stroke-miterlimit: 10;"></circle>
                                    <line x1="55.1" y1="30.4" x2="100" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                                    <line x1="45.1" y1="30.4" x2="0" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                                </svg>
                                <p class="text-gray-600 leading-relaxed font-light text-xl mx-auto pb-2">Have questions about information, please contact us.</p>
                            </header><!-- end section header -->

                            <form action="/" method="post" onsubmit="return validateForm()">
                                @csrf
                                <div class="flex flex-wrap flex-row -mx-4">
                                    <div class="flex-shrink w-full max-w-full md:w-1/2 px-4 mb-6">
                                        <label class="inline-block mb-2" for="name">Your Name</label>
                                        <input type="text" name="name" class="w-full leading-5 relative py-3 px-5 rounded text-gray-800 bg-white border-b border-gray-100 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600" id="name" require>
                                        <div class="validate"></div>
                                    </div>
                                    <div class="flex-shrink w-full max-w-full md:w-1/2 px-4 mb-6">
                                        <label class="inline-block mb-2" for="email">Your Email</label>
                                        <input type="email" class="w-full leading-5 relative py-3 px-5 rounded text-gray-800 bg-white border-b border-gray-100 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600" name="email" id="email" require>
                                        <div class="validate"></div>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label class="inline-block mb-2" for="subject">Subject</label>
                                    <input type="text" class="w-full leading-5 relative py-3 px-5 rounded text-gray-800 bg-white border-b border-gray-100 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600" name="subject" id="subject" require>
                                    <div class="validate"></div>
                                </div>
                                <div class="mb-6">
                                    <label class="inline-block mb-2" for="messages">Message</label>
                                    <textarea class="w-full leading-5 relative py-3 px-5 rounded text-gray-800 bg-white border-b border-gray-100 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600" name="message" rows="10" id="messages" require></textarea>
                                    <div class="validate"></div>
                                </div>
                                <div class="text-center mb-6">
                                    <button type="submit" class="py-2.5 px-10 inline-block text-center leading-normal text-gray-100 bg-black border border-black hover:text-white hover:ring-0 focus:outline-none focus:ring-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" class="inline-block mr-1" fill="currentColor" viewBox="0 0 512 512">
                                            <rect x="48" y="96" width="416" height="320" rx="40" ry="40" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" />
                                            <polyline points="112 160 256 272 400 160" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" />
                                        </svg>
                                        Send message
                                    </button>
                                </div>
                            </form><!-- end contact form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- end main -->

    <!-- =========={ FOOTER }==========  -->
    <footer class="bg-gray-50 text-gray-700">
        <!--Footer content-->
        <div id="footer-content" class="relative pt-8 xl:pt-16 pb-6 xl:pb-12">
            <div class="container xl:max-w-6xl mx-auto px-4 overflow-hidden">
                <div class="flex flex-wrap flex-row lg:justify-between -mx-3">
                    <div class="flex-shrink max-w-full w-full lg:w-2/5 px-3 lg:pr-16">
                        <div class="flex items-center mb-2">
                            <span class="text-3xl leading-normal mb-2 font-bold text-gray-800 mt-2">Archives</span>
                            <!-- <img src="src/img-min/logo.png" alt="LOGO"> -->
                        </div>
                        <p>Build in tailwind CSS</p>
                        <ul class="space-x-3 mt-6 mb-6 Lg:mb-0">
                            <!--facebook-->
                            <li class="inline-block">
                                <a target="_blank" class="hover:text-gray-800" rel="noopener noreferrer" href="https://facebook.com" title="Facebook">
                                    <!-- <i class="fab fa-facebook fa-2x"></i> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z"></path>
                                    </svg>
                                </a>
                            </li>
                            <!--twitter-->
                            <li class="inline-block">
                                <a target="_blank" class="hover:text-gray-800" rel="noopener noreferrer" href="https://twitter.com" title="Twitter">
                                    <!-- <i class="fab fa-twitter fa-2x"></i> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z"></path>
                                    </svg>
                                </a>
                            </li>
                            <!--youtube-->
                            <li class="inline-block">
                                <a target="_blank" class="hover:text-gray-800" rel="noopener noreferrer" href="https://youtube.com" title="Youtube">
                                    <!-- <i class="fab fa-youtube fa-2x"></i> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M508.64,148.79c0-45-33.1-81.2-74-81.2C379.24,65,322.74,64,265,64H247c-57.6,0-114.2,1-169.6,3.6-40.8,0-73.9,36.4-73.9,81.4C1,184.59-.06,220.19,0,255.79q-.15,53.4,3.4,106.9c0,45,33.1,81.5,73.9,81.5,58.2,2.7,117.9,3.9,178.6,3.8q91.2.3,178.6-3.8c40.9,0,74-36.5,74-81.5,2.4-35.7,3.5-71.3,3.4-107Q512.24,202.29,508.64,148.79ZM207,353.89V157.39l145,98.2Z"></path>
                                    </svg>
                                </a>
                            </li>
                            <!--instagram-->
                            <li class="inline-block">
                                <a target="_blank" class="hover:text-gray-800" rel="noopener noreferrer" href="https://instagram.com" title="Instagram">
                                    <!-- <i class="fab fa-instagram fa-2x"></i> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M349.33,69.33a93.62,93.62,0,0,1,93.34,93.34V349.33a93.62,93.62,0,0,1-93.34,93.34H162.67a93.62,93.62,0,0,1-93.34-93.34V162.67a93.62,93.62,0,0,1,93.34-93.34H349.33m0-37.33H162.67C90.8,32,32,90.8,32,162.67V349.33C32,421.2,90.8,480,162.67,480H349.33C421.2,480,480,421.2,480,349.33V162.67C480,90.8,421.2,32,349.33,32Z"></path>
                                        <path fill="currentColor" d="M377.33,162.67a28,28,0,1,1,28-28A27.94,27.94,0,0,1,377.33,162.67Z"></path>
                                        <path fill="currentColor" d="M256,181.33A74.67,74.67,0,1,1,181.33,256,74.75,74.75,0,0,1,256,181.33M256,144A112,112,0,1,0,368,256,112,112,0,0,0,256,144Z"></path>
                                    </svg>
                                </a>
                            </li><!--end instagram-->
                        </ul>
                    </div>
                    <div class="flex-shrink max-w-full w-full lg:w-3/5 px-3">
                        <div class="flex flex-wrap flex-row">
                            <div class="flex-shrink max-w-full w-1/2 md:w-1/3 mb-6 lg:mb-0">
                                <h4 class="text-base leading-normal mb-3 uppercase text-gray-800">Partnership</h4>
                                <ul>
                                    <!--  <li class="py-1 hover:text-gray-900"><a href="docs/index.html">LGU - South Cotabato</a></li>
                                    <li class="py-1 hover:text-gray-900"><a href="docs/components.html">NGO - South Cotabato</a></li>
                                    <li class="py-1 hover:text-gray-900"><a href="docs/credits.html">PNP</a></li>
                                    <li class="py-1 hover:text-gray-900"><a href="docs/changelogs.html">SF-PA</a></li> -->
                                </ul>
                            </div>
                            <div class="flex-shrink max-w-full w-1/2 md:w-1/3 mb-6 lg:mb-0">
                                <h4 class="text-base leading-normal mb-3 uppercase text-gray-800">Useful links</h4>
                                <ul>
                                    <!--   <li class="py-1 hover:text-gray-900"><a href="https://web.facebook.com/muslimaffairs.mce">Facebook</a></li>
                                    <li class="py-1 hover:text-gray-900"><a href="https://www.youtube.com/">Youtube</a></li>
                                    <li class="py-1 hover:text-gray-900"><a href="mailto:maoInfoSys@gmail.com">Gmail</a></li>
                                    <li class="py-1 hover:text-gray-900"><a href="https://www.linkedin.com/in/arzeljrz/">LinkedIn</a></li>
                           -->
                                </ul>
                            </div>
                            <div class="flex-shrink max-w-full w-1/2 md:w-1/3 mb-6 lg:mb-0">
                                <h4 class="text-base leading-normal mb-3 uppercase text-gray-800">Legal</h4>
                                <!--  <ul>
                                    <li class="py-1 hover:text-gray-900"><a href="#">Privacy Policy</a></li>
                                    <li class="py-1 hover:text-gray-900"><a href="#">Terms of Use</a></li>
                                    <li class="py-1 hover:text-gray-900"><a href="#">License</a></li>
                                    <li class="py-1 hover:text-gray-900"><a href="#">GDPR</a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Start footer copyright-->
        <div class="footer-dark">
            <div class="container xl:max-w-6xl mx-auto px-4 py-4 border-t border-gray-200 border-opacity-10">
                <div class="row">
                    <div class="col-12 col-md text-center">
                        <p class="d-block my-3">Archives System | All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div><!--End footer copyright-->
    </footer><!-- end footer -->

    <!-- =========={ SCROLL TO TOP }==========  -->
    <a href="#" class="back-top fixed p-4 rounded bg-gray-100 border border-gray-100 text-gray-500 dark:bg-gray-900 dark:border-gray-800 right-4 bottom-4 hidden" aria-label="Scroll To Top">
        <svg width="1rem" height="1rem" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v9a.5.5 0 01-1 0V4a.5.5 0 01.5-.5z" clip-rule="evenodd"></path>
            <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 01.708 0l3 3a.5.5 0 01-.708.708L8 3.707 5.354 6.354a.5.5 0 11-.708-.708l3-3z" clip-rule="evenodd"></path>
        </svg>
    </a>

    <!--Vendor js-->
    <script src="src/vendors/glightbox/dist/js/glightbox.min.js"></script>
    <script src="src/vendors/@splidejs/splide/dist/js/splide.min.js"></script>
    <script src="src/vendors/typed.js/lib/typed.min.js"></script>
    <script src="src/vendors/wow.js/dist/wow.min.js"></script>
    <script src="src/vendors/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

    <!-- Start development js -->
    <script src="src/js/theme.js"></script>
    <!-- End development js -->

    <!-- Production js -->
    <!-- <script src="dist/js/scripts.js"></script> -->
    <script>
        function validateForm() {
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var subject = document.getElementById("subject").value;
            var message = document.getElementById("messages").value;

            if (name === "" || email === "" || subject === "" || message === "") {
                alert("Please fill out all fields");
                return false;
            }
        }
    </script>

</body>

</html>
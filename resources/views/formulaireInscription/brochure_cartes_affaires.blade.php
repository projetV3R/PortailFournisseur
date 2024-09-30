@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('layouts.app')

@section('title', 'BrochuresCartesAffaires')

@section('contenu')
    <form action="{{ route('storeBrochuresCartesAffaires') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 p-8 lg:p-16">
            <!-- Première colonne -->
            <div>
                <h6 class="font-Alumni font-bold text-3xl md:text-5xl">BROCHURES ET CARTES D'AFFAIRES</h6>
                <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2">avez des documents a nous partager ?</h1>

                <div class="bg-primary-100 py-8 px-4 mt-8 ">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Telecharger vos documents</h4>

                    <div class="mt-6 w-full">
                        <div
                            data-hs-file-upload='{
                            "url": "/upload",
                            "extensions": {
                              "default": {
                                "class": "shrink-0 size-5"
                              },
                              "xls": {
                                "class": "shrink-0 size-5"
                              },
                              "zip": {
                                "class": "shrink-0 size-5"
                              },
                              "csv": {
                                "icon": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4\"/><path d=\"M14 2v4a2 2 0 0 0 2 2h4\"/><path d=\"m5 12-3 3 3 3\"/><path d=\"m9 18 3-3-3-3\"/></svg>",
                                "class": "shrink-0 size-5"
                              }
                            }
                          }'>
                            <template data-hs-file-upload-preview="">
                                <div class="p-3 bg-white border border-solid border-gray-300 rounded-xl">
                                    <div class="mb-1 flex justify-between items-center">
                                        <div class="flex items-center gap-x-3">
                                            <span
                                                class="size-10 flex justify-center items-center border border-gray-200 text-gray-500 rounded-lg"
                                                data-hs-file-upload-file-icon="">
                                                <img class="rounded-lg hidden" data-dz-thumbnail="">
                                            </span>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">
                                                    <span class="truncate inline-block max-w-[300px] align-bottom"
                                                        data-hs-file-upload-file-name=""></span>.<span
                                                        data-hs-file-upload-file-ext=""></span>
                                                </p>
                                                <p class="text-xs text-gray-500" data-hs-file-upload-file-size=""></p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-x-2">
                                            <button type="button"
                                                class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800"
                                                data-hs-file-upload-remove="">
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M3 6h18"></path>
                                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                    <line x1="10" x2="10" y1="11" y2="17">
                                                    </line>
                                                    <line x1="14" x2="14" y1="11" y2="17">
                                                    </line>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-x-3 whitespace-nowrap">
                                        <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden"
                                            role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                            data-hs-file-upload-progress-bar="">
                                            <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition-all duration-500 hs-file-upload-complete:bg-green-500"
                                                style="width: 0" data-hs-file-upload-progress-bar-pane=""></div>
                                        </div>
                                        <div class="w-10 text-end">
                                            <span class="text-sm text-gray-800">
                                                <span data-hs-file-upload-progress-bar-value="">0</span>%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </template>

                            <div class="cursor-pointer p-12 flex justify-center bg-white border border-black"
                                data-hs-file-upload-trigger="">
                                <div class="text-center">
                                    <span
                                        class="inline-flex justify-center items-center size-16 bg-gray-100 text-gray-800 rounded-full">
                                        <svg class="shrink-0 size-6" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                            <polyline points="17 8 12 3 7 8"></polyline>
                                            <line x1="12" x2="12" y1="3" y2="15"></line>
                                        </svg>
                                    </span>

                                    <div class="mt-4 flex flex-wrap justify-center text-sm leading-6 text-gray-600">
                                        <span class="pe-1 font-medium text-gray-800">
                                            Drop your file here or
                                        </span>
                                        <span
                                            class="bg-white font-semibold text-blue-600 hover:text-blue-700 rounded-lg decoration-2 hover:underline focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-600 focus-within:ring-offset-2">browse</span>
                                    </div>

                                    <p class="mt-1 text-xs text-gray-400">
                                        Pick a file up to 2MB.
                                    </p>
                                </div>
                            </div>

                            <div class="mt-4 space-y-2 empty:mt-0" data-hs-file-upload-previews=""></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deuxième colonne -->
            <div>
                <h6 class="font-Alumni text-white font-bold text-3xl md:text-5xl hide">Merci de vous identifier !</h6>
                <h1 class="font-Alumni text-white font-semibold text-md md:text-lg mt-2">Dites-nous en plus sur vous
                </h1>

                <div class="bg-secondary-100 py-8 px-4 mt-8">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Consigne</h4>

                    <div class="mt-6 w-full max-w-md flex gap-4 columns-2 ">
                        <p class="font-Alumni md:text-lg">
                            Seuls les fichiers de type "document imprimables" sont acceptés (doc, docx, pdf, jpg, etc).
                            Aussi, la limite de
                            taille de l'ensemble des fichiers pour un Fournisseur est de 75 Mo.
                        </p>
                    </div>
                </div>

                <button type="submit" class="mt-4 w-full text-white bg-tertiary-400 hover:bg-tertiary-300 py-2.5">
                    <h1 class="font-Alumni font-bold text-lg md:text-2xl">Suivant</h1>
                </button>

            </div>
        </div>
    </form>
@endsection

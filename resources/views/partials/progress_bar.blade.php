@php
    $steps = ['identification', 'produitsServices', 'licences', 'coordonnees', 'contacts', 'brochuresCartes'];
    $currentStep = 0;

    foreach ($steps as $index => $step) {
        if (session()->has($step)) {
            $currentStep = $index + 1;
        } else {
            break;
        }
    }
@endphp

<ol class="flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base justify-evenly">
    
    <li class="relative flex flex-col items-center {{ $currentStep >= 1 ? 'text-green-600' : 'text-gray-500' }}">
        <div class="flex items-center justify-center w-10 h-10 rounded-full border-2 {{ $currentStep >= 1 ? 'border-green-600' : 'border-gray-300' }}">
            @if($currentStep >= 1)
                <a href="/Identification" class="block">
                    <span class="iconify" data-icon="mdi:account-circle" data-width="20" data-height="20"></span>
                </a>
            @else
                <span class="iconify" data-icon="mdi:account-circle" data-width="20" data-height="20"></span>
            @endif
        </div>
        <span class="mt-2 hidden min-[650px]:block text-sm md:text-base ">Identification</span>
        @if($currentStep >= 1)
        <span class="iconify" data-icon="material-symbols:done" data-width="20" data-height="20"></span>
        @endif
    </li>
    
  
    <div class="w-24 h-0.5 hidden  min-[650px]:block  {{ $currentStep >= 1 ? 'bg-green-600' : 'bg-gray-300' }}"></div>

 
    <li class="relative flex flex-col items-center {{ $currentStep >= 2 ? 'text-green-600' : 'text-gray-500' }}">
        <div class="flex items-center justify-center w-10 h-10 rounded-full border-2 {{ $currentStep >= 2 ? 'border-green-600' : 'border-gray-300' }}">
            @if($currentStep >= 1)
                <a href="/ProduitsServices" class="block">
                    <span class="iconify" data-icon="mdi:package-variant-closed" data-width="20" data-height="20"></span>
                </a>
            @else
                <span class="iconify" data-icon="mdi:package-variant-closed" data-width="20" data-height="20"></span>
            @endif
        </div>
        <span class="mt-2 hidden  min-[650px]:block text-sm md:text-base">Produits</span>
        @if($currentStep >= 2)
        <span class="iconify" data-icon="material-symbols:done" data-width="20" data-height="20"></span>
        @endif
    </li>

 
    <div class="w-24 h-0.5 hidden min-[650px]:block {{ $currentStep >= 2 ? 'bg-green-600' : 'bg-gray-300' }}"></div>


    <li class="relative flex flex-col items-center {{ $currentStep >= 3 ? 'text-green-600' : 'text-gray-500' }}">
        <div class="flex items-center justify-center w-10 h-10 rounded-full border-2 {{ $currentStep >= 3 ? 'border-green-600' : 'border-gray-300' }}">
            @if($currentStep >= 2)
                <a href="/Licences" class="block">
                    <span class="iconify" data-icon="mdi:certificate" data-width="20" data-height="20"></span>
                </a>
            @else
                <span class="iconify" data-icon="mdi:certificate" data-width="20" data-height="20"></span>
            @endif
        </div>
        <span class="mt-2 hidden  min-[650px]:block text-sm md:text-base">Licences</span>
        @if($currentStep >= 3)
        <span class="iconify" data-icon="material-symbols:done" data-width="20" data-height="20"></span>
        @endif
    </li>

    <div class="w-24 h-0.5 hidden min-[650px]:block {{ $currentStep >= 3 ? 'bg-green-600' : 'bg-gray-300' }}"></div>

  
    <li class="relative flex flex-col items-center {{ $currentStep >= 4 ? 'text-green-600' : 'text-gray-500' }}">
        <div class="flex items-center justify-center w-10 h-10 rounded-full border-2 {{ $currentStep >= 4 ? 'border-green-600' : 'border-gray-300' }}">
            @if($currentStep >= 4)
                <a href="/Licences" class="block">
                    <span class="iconify" data-icon="material-symbols:location-on" data-width="20" data-height="20"></span>
                </a>
            @else
                <span class="iconify" data-icon="material-symbols:location-on" data-width="20" data-height="20"></span>
            @endif
        </div>
        <span class="mt-2 hidden  min-[650px]:block text-sm md:text-base">Coordonnée</span>
        @if($currentStep >= 4)
        <span class="iconify" data-icon="material-symbols:done" data-width="20" data-height="20"></span>
        @endif
    </li>

    <div class="w-24 h-0.5 hidden min-[650px]:block {{ $currentStep >= 4 ? 'bg-green-600' : 'bg-gray-300' }}"></div>

   
    <li class="relative flex flex-col items-center {{ $currentStep >= 5 ? 'text-green-600' : 'text-gray-500' }}">
        <div class="flex items-center justify-center w-10 h-10 rounded-full border-2 {{ $currentStep >= 5 ? 'border-green-600' : 'border-gray-300' }}">
            @if($currentStep >= 5)
                <a href="/Licences" class="block">
                    <span class="iconify" data-icon="material-symbols:contact-phone-rounded" data-width="20" data-height="20"></span>
                </a>
            @else
                <span class="iconify" data-icon="material-symbols:contact-phone-rounded" data-width="20" data-height="20"></span>
            @endif
        </div>
        <span class="mt-2 hidden  min-[650px]:block text-sm md:text-base">Contact</span>
        @if($currentStep >= 5)
        <span class="iconify" data-icon="material-symbols:done" data-width="20" data-height="20"></span>
        @endif
    </li>

    <div class="w-24 h-0.5 hidden min-[650px]:block {{ $currentStep >= 5 ? 'bg-green-600' : 'bg-gray-300' }}"></div>

    
    <li class="relative flex flex-col items-center {{ $currentStep >= 6 ? 'text-green-600' : 'text-gray-500' }}">
        <div class="flex items-center justify-center w-10 h-10 rounded-full border-2 {{ $currentStep >= 6 ? 'border-green-600' : 'border-gray-300' }}">
            @if($currentStep >= 6)
                <a href="/Licences" class="block">
                    <span class="iconify" data-icon="material-symbols:attach-file" data-width="20" data-height="20"></span>
                </a>
            @else
                <span class="iconify" data-icon="material-symbols:attach-file" data-width="20" data-height="20"></span>
            @endif
        </div>
        <span class="mt-2 hidden  min-[650px]:block text-sm md:text-base">Brochures</span>
        @if($currentStep >= 6)
        <span class="iconify" data-icon="material-symbols:done" data-width="20" data-height="20"></span>
        @endif
    </li>

    
    <div class="w-24 h-0.5 hidden min-[650px]:block {{ $currentStep >= 5 ? 'bg-green-600' : 'bg-gray-300' }}"></div>

    
    <li class="relative flex flex-col items-center {{ $currentStep >= 6 ? 'text-green-600' : 'text-gray-500' }}">
        <div class="flex items-center justify-center w-10 h-10 rounded-full border-2 {{ $currentStep >= 6 ? 'border-green-600' : 'border-gray-300' }}">
            @if($currentStep >= 6)
                <a href="/Resume" class="block">
                    <span class="iconify" data-icon="material-symbols:attach-file" data-width="20" data-height="20"></span>
                </a>
            @else
                <span class="iconify" data-icon="f7:paperplane" data-width="20" data-height="20"></span>
            @endif
        </div>
        <span class="mt-2 hidden  min-[650px]:block text-sm md:text-base">Finalisation</span>
    </li>


    

</ol>

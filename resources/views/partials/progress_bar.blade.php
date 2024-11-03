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

<ol class="flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base gap-x-2 md:gap-x-0">
    
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
        <span class="mt-2 hidden xl:block">Identification</span>
    </li>
    
  
    <div class="w-24 h-0.5 hidden md:block {{ $currentStep >= 1 ? 'bg-green-600' : 'bg-gray-300' }}"></div>

 
    <li class="relative flex flex-col items-center {{ $currentStep >= 2 ? 'text-green-600' : 'text-gray-500' }}">
        <div class="flex items-center justify-center w-10 h-10 rounded-full border-2 {{ $currentStep >= 2 ? 'border-green-600' : 'border-gray-300' }}">
            @if($currentStep >= 2)
                <a href="/ProduitsServices" class="block">
                    <span class="iconify" data-icon="mdi:package-variant-closed" data-width="20" data-height="20"></span>
                </a>
            @else
                <span class="iconify" data-icon="mdi:package-variant-closed" data-width="20" data-height="20"></span>
            @endif
        </div>
        <span class="mt-2 hidden xl:block">Produits</span>
    </li>

 
    <div class="w-24 h-0.5 {{ $currentStep >= 2 ? 'bg-green-600' : 'bg-gray-300' }}"></div>


    <li class="relative flex flex-col items-center {{ $currentStep >= 3 ? 'text-green-600' : 'text-gray-500' }}">
        <div class="flex items-center justify-center w-10 h-10 rounded-full border-2 {{ $currentStep >= 3 ? 'border-green-600' : 'border-gray-300' }}">
            @if($currentStep >= 3)
                <a href="/Licences" class="block">
                    <span class="iconify" data-icon="mdi:certificate" data-width="20" data-height="20"></span>
                </a>
            @else
                <span class="iconify" data-icon="mdi:certificate" data-width="20" data-height="20"></span>
            @endif
        </div>
        <span class="mt-2 hidden xl:block">Licences</span>
    </li>

    <div class="w-24 h-0.5 {{ $currentStep >= 3 ? 'bg-green-600' : 'bg-gray-300' }}"></div>

  
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
        <span class="mt-2 hidden xl:block">Coordonnée</span>
    </li>

    <div class="w-24 h-0.5 {{ $currentStep >= 4 ? 'bg-green-600' : 'bg-gray-300' }}"></div>

   
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
        <span class="mt-2 hidden xl:block">Contact</span>
    </li>

    <div class="w-24 h-0.5 {{ $currentStep >= 5 ? 'bg-green-600' : 'bg-gray-300' }}"></div>

    
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
        <span class="mt-2 hidden xl:block">Brochures</span>
    </li>

    

</ol>


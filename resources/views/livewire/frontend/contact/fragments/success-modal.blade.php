 <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" x-cloak>

     <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-sm text-center">
         <!-- Success Icon -->
         <div
             class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 border-2 border-green-500">
             <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
             </svg>
         </div>

         <!-- Message -->
         <h2 class="mt-4 text-lg font-semibold text-gray-800">
             Your message has been sent!
         </h2>

         <!-- OK Button -->
         <button wire:click="$set('showModal', false)"
             class="mt-6 px-6 py-2 bg-green-500 text-white text-lg font-medium rounded-full hover:bg-green-600 transition">
             OK
         </button>
     </div>
 </div>

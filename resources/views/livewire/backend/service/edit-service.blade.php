<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-300">
            Edit Special Service
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Edit Special Service</li>
            </ol>
        </nav>
    </div>
    <div class="rounded-md bg-white px-6 pb-3 pt-6 shadow dark:bg-[#132337]">
        <h2 class="mb-4 text-lg font-semibold tracking-tight text-gray-800 dark:text-gray-200">
            Special Service Information
        </h2>
        <form method="post">
            <div class="space-y-4">
                <div class="space-y-4 rounded-xl border p-4 dark:border-[#1b2f46] dark:bg-[#102030]">

                    <!-- Service Name -->
                    <div>
                        <label for="name" class="block text-sm text-gray-700 dark:text-gray-400">
                            Service Name*
                        </label>
                        <input type="text" wire:model="form.name" id="name" placeholder="Enter Service Name"
                            class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                        @error("form.name")
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label for="image" class="block text-sm text-gray-700 dark:text-gray-400">
                            Service Image*
                        </label>
                        <input type="file" wire:model="form.image" id="image"
                            class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-[7px] text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                        @error("form.image")
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Service Description -->
                    <div>
                        <div wire:ignore>
                            <label for="editorShortDesc" class="mb-2 block text-sm text-gray-700 dark:text-gray-400">
                                Service Description*
                            </label>
                            <div id="editorShortDesc" style="height: 200px;"></div>
                            <input type="hidden" wire:model="form.short_desc" id="short_desc">
                        </div>
                        <div class="mt-1">
                            @error("form.short_desc")
                                <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <h2 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-gray-300">
                        Care Level Information
                    </h2>

                    <!-- Add Care Level -->
                    @foreach ($form->care_levels as $index => $level)
                        <div wire:key="care-level-{{ $index }}"
                            class="space-y-4 rounded-xl border p-4 dark:border-[#1b2f46] dark:bg-[#102030]">
                            <!-- Care Level -->
                            <div>
                                <label for="care_level_id_{{ $index }}"
                                    class="block text-sm text-gray-700 dark:text-gray-400">
                                    Care Level*
                                </label>
                                <select wire:model="form.care_levels.{{ $index }}.care_level_id"
                                    id="care_level_id_{{ $index }}" disabled
                                    class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none disabled:cursor-not-allowed disabled:bg-gray-50 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300">
                                    <option value="">-- Select a Care Level --</option>
                                    @foreach ($form->careLevels as $careLevel)
                                        <option value="{{ $careLevel->id }}">{{ $careLevel->name }}</option>
                                    @endforeach
                                </select>

                                @error("form.care_levels.{$index}.care_level_id")
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div>
                                <label class="mb-2 block text-sm text-gray-700 dark:text-gray-400">Description*</label>

                                <div wire:ignore>
                                    <div id="editor-{{ $index }}" class="quill-editor" style="height: 200px;"
                                        data-editor="{{ $index }}">
                                    </div>
                                </div>

                                <input type="hidden" id="editorInput-{{ $index }}"
                                    wire:model="form.care_levels.{{ $index }}.desc">

                                @error("form.care_levels.{$index}.desc")
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Hours & Pricing -->
                            {{-- <div>
                                <div class="mt-3 space-y-3">
                                    @foreach ($level["options"] as $oIndex => $option)
                                        <div class="flex items-center gap-3"
                                            wire:key="care-option-{{ $index }}-{{ $oIndex }}">

                                            <!-- Hours -->
                                            <div class="flex-1">
                                                <label class="mb-1 block text-sm text-gray-700 dark:text-gray-400">
                                                    Hours*
                                                </label>
                                                <input type="number"
                                                    wire:model="form.care_levels.{{ $index }}.options.{{ $oIndex }}.hours"
                                                    placeholder="Hour (e.g. 8)"
                                                    class="w-full rounded-md border px-4 py-2.5 text-sm dark:bg-[#132337] dark:text-gray-300" />
                                                @error("form.care_levels.{$index}.options.{$oIndex}.hours")
                                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Price -->
                                            <div class="flex-1">
                                                <label class="mb-1 block text-sm text-gray-700 dark:text-gray-400">
                                                    Price*
                                                </label>
                                                <input type="number"
                                                    wire:model="form.care_levels.{{ $index }}.options.{{ $oIndex }}.price"
                                                    placeholder="Price"
                                                    class="w-full rounded-md border px-4 py-2.5 text-sm dark:bg-[#132337] dark:text-gray-300" />
                                                @error("form.care_levels.{$index}.options.{$oIndex}.price")
                                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Remove Option -->
                                            @if (count($level["options"]) > 1)
                                                <button type="button"
                                                    wire:click="removeOption({{ $index }}, {{ $oIndex }})"
                                                    class="mt-5 flex h-[42px] w-10 items-center justify-center rounded-md bg-red-500 text-white hover:bg-red-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6" />
                                                    </svg>
                                                </button>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Add Option -->
                                <button type="button" wire:click="addOption({{ $index }})"
                                    class="mt-3 rounded-full border border-gray-400 px-4 py-2 text-sm font-medium hover:bg-gray-100 dark:border-gray-600 dark:hover:bg-[#1b2f46]">
                                    + Add Hour/Price
                                </button>
                            </div> --}}

                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Create Button -->
            <div class="mt-5 flex justify-end space-x-3">
                <button type="reset"
                    class="rounded-md px-4 py-2.5 text-sm text-red-500 transition-colors duration-300 hover:bg-red-100">
                    Reset
                </button>
                <button wire:click='update' type="button"
                    class="flex w-full items-center justify-center rounded-md bg-blue-500 px-5 py-3 text-sm leading-5 text-white transition duration-300 ease-in-out hover:bg-blue-600 focus:outline-none sm:w-auto sm:px-4 sm:py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="mr-2 h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                            clip-rule="evenodd" />
                    </svg>
                    Update
                </button>
            </div>
        </form>
    </div>

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var quill = new Quill('#editorShortDesc', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{
                            'header': [1, 2, 3, false]
                        }],
                        ['bold', 'italic', 'underline'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                    ]
                }
            });

            // Set the initial content from Livewire (escaped properly)
            let initialContent = @json($form->short_desc);
            quill.root.innerHTML = initialContent ?? "";

            // Update Livewire model when Quill content changes
            quill.on('text-change', function() {
                @this.set('form.short_desc', quill.root.innerHTML);
            });

            Livewire.hook('message.processed', (message, component) => {
                let updatedContent = @json($form->short_desc);
                if (quill.root.innerHTML !== updatedContent) {
                    quill.root.innerHTML = updatedContent ?? "";
                }
            });
        });
    </script>

    <script>
        document.addEventListener("alpine:init", () => {

            function initQuillEditors() {
                document.querySelectorAll(".quill-editor").forEach((editorEl) => {

                    const index = editorEl.dataset.editor;
                    const inputEl = document.querySelector(`#editorInput-${index}`);

                    if (!inputEl) return;

                    // Prevent multiple initialization
                    if (editorEl.classList.contains("quill-loaded")) return;
                    editorEl.classList.add("quill-loaded");

                    // Initialize Quill
                    let quill = new Quill(editorEl, {
                        theme: "snow",
                        modules: {
                            toolbar: [
                                [{
                                    header: [1, 2, 3, false]
                                }],
                                ["bold", "italic", "underline"],
                                [{
                                    list: "ordered"
                                }, {
                                    list: "bullet"
                                }],
                            ],
                        },
                    });

                    // ----------------------------
                    //   LOAD OLD VALUE ON EDIT
                    // ----------------------------
                    // Use setTimeout to ensure Quill root is ready
                    setTimeout(() => {
                        const oldValue = inputEl.value;

                        if (oldValue && quill.root.innerHTML.trim() === "<p><br></p>") {
                            quill.root.innerHTML = oldValue; // Inject saved HTML
                        }
                    }, 50);

                    // ----------------------------
                    //   SYNC: QUILL → LIVEWIRE
                    // ----------------------------
                    quill.on("text-change", () => {
                        inputEl.value = quill.root.innerHTML;
                        inputEl.dispatchEvent(new Event("input"));
                    });
                });
            }

            // First time page loads
            initQuillEditors();

            // Re-run every time Livewire updates DOM
            document.addEventListener("livewire:message.processed", () => {
                initQuillEditors();
            });

        });
    </script>


</div>

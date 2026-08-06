@extends('layouts.app')

@section('title', 'Special Form Components')

@section('breadcrumb', 'Forms')

@section('content')
<div class="space-y-6">
    <!-- Special Form Components -->
    <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-6 shadow-sm">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Special Form Components</h2>
        <p class="text-gray-600 dark:text-gray-400 mb-6">Examples of advanced form components with plugin integrations.</p>

        <form x-data="{
            startDate: '{{ now()->format('Y-m-d') }}',
            endDate: '{{ now()->addDays(7)->format('Y-m-d') }}',
            category: 'general',
            priority: 'medium',
            tags: [],
            tagInput: '',
            files: []
        }">
            <div class="space-y-6">
                <!-- Date Range Picker -->
                <div>
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">Date Range (Flatpickr)</h3>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <x-nameera::form.label for="startDate">Start Date</x-nameera::form.label>
                            <x-nameera::form.datepicker 
                                id="startDate"
                                x-model="startDate"
                                label="Start Date"
                                placeholder="Select start date"
                                :config="['dateFormat' => 'Y-m-d', 'altFormat' => 'F j, Y']"
                            />
                        </div>
                        <div>
                            <x-nameera::form.label for="endDate">End Date</x-nameera::form.label>
                            <x-nameera::form.datepicker 
                                id="endDate"
                                x-model="endDate"
                                label="End Date"
                                placeholder="Select end date"
                                :config="['dateFormat' => 'Y-m-d', 'altFormat' => 'F j, Y']"
                            />
                        </div>
                    </div>
                </div>

                <!-- Select with Search (Choices.js) -->
                <div>
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">Select with Search</h3>
                    <x-nameera::form.label for="category">Category</x-nameera::form.label>
                    <x-nameera::form.select 
                        id="category"
                        x-model="category"
                        label="Select Category"
                        placeholder="Choose a category"
                        :options="[
                            'general' => 'General Inquiry',
                            'technical' => 'Technical Support',
                            'billing' => 'Billing Issue',
                            'feature' => 'Feature Request',
                            'bug' => 'Bug Report',
                            'other' => 'Other'
                        ]"
                        help="Start typing to search options"
                    />
                </div>

                <!-- Multi-select Tags -->
                <div>
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">Tags (Multi-select)</h3>
                    <x-nameera::form.label for="tags">Tags</x-nameera::form.label>
                    <div class="space-y-3">
                        <div class="flex flex-wrap gap-2 mb-2" x-show="tags.length > 0">
                            <template x-for="(tag, index) in tags" :key="index">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-primary/10 text-primary">
                                    <span x-text="tag"></span>
                                    <button 
                                        type="button" 
                                        @click="tags.splice(index, 1)"
                                        class="ml-2 hover:text-primary-700"
                                    >
                                        ×
                                    </button>
                                </span>
                            </template>
                        </div>
                        <div class="flex gap-2">
                            <x-nameera::form.input 
                                id="tagInput"
                                x-model="tagInput"
                                placeholder="Add a tag and press Enter"
                                @keydown.enter.prevent="if(tagInput.trim()) { tags.push(tagInput.trim()); tagInput = ''; }"
                            />
                            <button 
                                type="button" 
                                @click="if(tagInput.trim()) { tags.push(tagInput.trim()); tagInput = ''; }"
                                class="btn-secondary whitespace-nowrap"
                            >
                                Add Tag
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Priority Select -->
                <div>
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">Priority Level</h3>
                    <div class="grid grid-cols-3 gap-3">
                        <label class="relative cursor-pointer">
                            <input type="radio" name="priority" value="low" x-model="priority" class="sr-only peer">
                            <div class="p-4 border-2 border-gray-200 dark:border-gray-700 rounded-lg text-center peer-checked:border-primary peer-checked:bg-primary/5 transition-colors hover:border-gray-300 dark:hover:border-gray-600">
                                <div class="w-4 h-4 mx-auto mb-2 rounded-full bg-green-100 dark:bg-green-900/20"></div>
                                <span class="block text-sm font-medium text-gray-900 dark:text-white">Low</span>
                            </div>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="priority" value="medium" x-model="priority" class="sr-only peer" checked>
                            <div class="p-4 border-2 border-gray-200 dark:border-gray-700 rounded-lg text-center peer-checked:border-primary peer-checked:bg-primary/5 transition-colors hover:border-gray-300 dark:hover:border-gray-600">
                                <div class="w-4 h-4 mx-auto mb-2 rounded-full bg-yellow-100 dark:bg-yellow-900/20"></div>
                                <span class="block text-sm font-medium text-gray-900 dark:text-white">Medium</span>
                            </div>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="priority" value="high" x-model="priority" class="sr-only peer">
                            <div class="p-4 border-2 border-gray-200 dark:border-gray-700 rounded-lg text-center peer-checked:border-primary peer-checked:bg-primary/5 transition-colors hover:border-gray-300 dark:hover:border-gray-600">
                                <div class="w-4 h-4 mx-auto mb-2 rounded-full bg-red-100 dark:bg-red-900/20"></div>
                                <span class="block text-sm font-medium text-gray-900 dark:text-white">High</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- File Upload (FilePond) -->
                <div>
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">File Upload</h3>
                    <x-nameera::form.file-upload 
                        id="documents"
                        label="Upload Documents"
                        help="Upload PDF, DOC, or image files (Max 10MB each)"
                        :options="['maxFiles' => 5, 'maxFileSize' => '10MB']"
                        multiple
                    />
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Supports drag & drop. Click or drop files here.</p>
                </div>

                <!-- Rich Text Editor (TinyMCE) -->
                <div>
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">Rich Text Editor</h3>
                    <x-nameera::form.editor 
                        id="description"
                        label="Description"
                        height="300px"
                        help="Write detailed description with formatting"
                    />
                </div>

                <!-- Form Actions -->
                <div class="pt-4 border-t border-gray-200 dark:border-gray-800">
                    <div class="flex justify-end space-x-3">
                        <button type="button" class="btn-secondary">
                            Cancel
                        </button>
                        <button type="submit" class="btn-primary">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Component Usage Instructions -->
    <div class="bg-blue-50 dark:bg-blue-900/10 rounded-xl border border-blue-200 dark:border-blue-800 p-6">
        <h3 class="text-lg font-semibold text-blue-900 dark:text-blue-300 mb-4">⚡ How to Use These Components</h3>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div>
                <h4 class="font-medium text-blue-800 dark:text-blue-400 mb-2">Datepicker</h4>
                <pre class="text-sm bg-white dark:bg-gray-800 p-3 rounded overflow-x-auto"><code>&#123;&#123;-- Date picker --&#125;&#125;
<x-nameera::form.datepicker
    name="start_date"
    label="Start Date"
    :config="['dateFormat' => 'Y-m-d']"
/></code></pre>
            </div>
            <div>
                <h4 class="font-medium text-blue-800 dark:text-blue-400 mb-2">Select with Search</h4>
                <pre class="text-sm bg-white dark:bg-gray-800 p-3 rounded overflow-x-auto"><code>&#123;&#123;-- Select with search --&#125;&#125;
<x-nameera::form.select
    name="category"
    label="Category"
    :options="['opt1' => 'Option 1', 'opt2' => 'Option 2']"
/></code></pre>
            </div>
            <div>
                <h4 class="font-medium text-blue-800 dark:text-blue-400 mb-2">File Upload</h4>
                <pre class="text-sm bg-white dark:bg-gray-800 p-3 rounded overflow-x-auto"><code>&#123;&#123;-- File upload --&#125;&#125;
<x-nameera::form.file-upload
    name="documents[]"
    label="Documents"
    :options="['maxFiles' => 5]"
    multiple
/></code></pre>
            </div>
            <div>
                <h4 class="font-medium text-blue-800 dark:text-blue-400 mb-2">Rich Text Editor</h4>
                <pre class="text-sm bg-white dark:bg-gray-800 p-3 rounded overflow-x-auto"><code>&#123;&#123;-- Rich text editor --&#125;&#125;
<x-nameera::form.editor
    name="content"
    label="Content"
    height="400px"
/></code></pre>
            </div>
        </div>
    </div>
</div>
@endsection
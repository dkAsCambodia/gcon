<!-- resources/views/livewire/popup.blade.php -->

<div>
    <button wire:click="openPopup">Open Popup</button>

    @if ($showPopup)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50">
            <div class="bg-white p-6 rounded shadow-lg">
                <h2 class="text-xl mb-4">Popup Content</h2>
                <p>This is a simple popup.</p>
                <button wire:click="closePopup" class="mt-4 bg-red-500 text-white p-2 rounded">Close</button>
            </div>
        </div>
    @endif
</div>

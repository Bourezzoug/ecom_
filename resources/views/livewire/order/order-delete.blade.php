<div>
    <x-confirmation-modal wire:model="showDeleteModel">
        <x-slot name="title">
            {{ __('Delete Product') }} 
        </x-slot>

        <x-slot name="content">
            {{ __('You want to delete an order') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeDeleteModel" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Supprimer') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>




</div>

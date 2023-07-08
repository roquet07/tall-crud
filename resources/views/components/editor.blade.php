@php
    $id = $id ?? strtolower(str_replace('_', '-', str_replace('.', '', $xModel ?? $attributes->wire('model')->value())));
    $xModel = $xModel ?? null;
@endphp
<div wire:ignore>
    <textarea id="{{ $id }}" x-data="{
        model: @entangle($attributes->wire('model')) @if($defer ?? $attributes->wire('model')->hasModifier('defer'))
            .defer
        @endif,
        editor: null,
        loadCkeditor() {
    
            window.CkEditorInits = []
    
            window.initializeCkEditor = () => {
    
                window.CkEditorInits.forEach((dtackeditor) => dtackeditor.destroy());
    
    
                let ck = ClassicEditor.create(document.querySelector('#{{ $id }}'), {
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            'bulletedList',
                            'numberedList',
                            '|',
                            'blockQuote',
                            'link',
                            'insertTable',
                            '|',
                            'undo',
                            'redo'
                        ]
                    }
                })
    
                ck.then(editor => {
    
                    editor.setData(this.model);
                    editor.model.document.on('change:data', () => {
    
    
                        this.model = editor.getData();
                    });
                })
    
                this.editor = ck
                window.CkEditorInits.push(ck);
            }
    
            initializeCkEditor()
        },
        setLoadData(data) {
    
            this.editor.then(editor => {
                editor.setData(this.model);
                editor.model.document.on('change:data', () => {
                    this.model = editor.getData();
                });
    
            })
        },
        setClearData() {
            this.editor.then(editor => {
                editor.setData('');
    
            })
    
        }
    
    
    
    }"
        class=" w-full border-gray-200 rounded-md text-sm focus:border-blue-300 focus:ring-blue-300" cols="30"
        rows="20" @action-load-data-ckeditor.window="setLoadData($event.detail)" @action-clear-data-ckeditor.window="setClearData($event.detail)" x-init="loadCkeditor()"></textarea>
</div>

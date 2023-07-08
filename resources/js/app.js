import './bootstrap';
import 'preline';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import Alpine from 'alpinejs';

window.Alpine = Alpine;
window.ClassicEditor = ClassicEditor;

Alpine.start();
document.addEventListener('DOMContentLoaded', () => {

    Livewire.on('showModal', (id) => window.HSOverlay.open(document.querySelector(`#${id}`)));
    
    Livewire.on('showOfModal', (id) => window.HSOverlay.close(document.querySelector(`#${id}`)));
 

    
})

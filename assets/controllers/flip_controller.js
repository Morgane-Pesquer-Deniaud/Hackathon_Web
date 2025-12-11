import { Controller } from '@hotwired/stimulus';

export default class extends Controller {

    connect() {
        console.log('FLIP CONTROLLER CONNECTÉ ✅');
    }

    flip() {
        const cardInner = this.element.querySelector('.card-inner');
        cardInner.classList.toggle('rotate-y-180-card');
        console.log('clic détecté ✅');
    }

}

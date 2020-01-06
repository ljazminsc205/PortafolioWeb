//instancia de Vue
const app = new Vue({
    el: '#app',
    data: {
        titulo: 'Hola mundo con Vue',
        frutas: ['Manzana', 'Pera', 'Uva'],
        //Con objetos:
        nombres: [
            { nombre: 'Juan', cantidad: 10 },
            { nombre: 'Juan2', cantidad: 0 },
            { nombre: 'Juan3', cantidad: 13 }
        ],
        nuevaFruta: '',
        total: 0
    },
    methods: {
        agregarFruta() {
            console.log('hjahgh');
            //llamamos al array frutas
            //con this se accede a distintas propiedades que estan en la instancia data
            //push agregar un objeto al array
            this.nombres.push({
                nombre: this.nuevaFruta, cantidad: 0
            });
            this.nuevaFruta = '';
        }
    },
    //son un arreglo, se crean las funciones que se necesiten
    computed: {
        //se ejecuta cada vez que se haga un cambio en cantidad
        sumarFrutas() {
            //para que siempre inicie en cero
            this.total = 0;
            for (x of this.nombres) {
                this.total += x.cantidad;
            }
            return this.total;
        }
    }
})


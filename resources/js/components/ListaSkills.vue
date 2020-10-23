<template>
    <div>
        <ul class="flex flex-wrap justify-center" id="listskill">
            <li
                class="border border-gray-500 px-10 py-3 rounded mr-4 mb-3 cursor-pointer"
                :class="verificarClaseActiva(skill)"
                v-for="(skill, i) in this.skills"
                v-bind:key="i"
                v-on:click="activar($event)"
            >{{ skill }}</li>
        </ul>
        <input type="hidden" name="skills" id="skills">
        <!-- <div class="pt-4">
            <ul class="flex flex-wrap justify-center" id="skillplus">
            </ul>
            <label for="addskill" class="block text-gray-700 text-sm mb-2">Añade habilidad personalizada</label>
            <input type="text" class="p-3 bg-gray-100 rounded form-input w-1/3" name="addskill" id="addskill" v-on:keydown.enter.prevent='addSkill($event)'>
        </div> -->
    </div>
</template>

<script>
export default {
    props: ['skills','oldskills'],
    created: function() {
        if (this.oldskills) {
            const skillsArray = this.oldskills.split(',');
            skillsArray.forEach(skill =>
                this.habilidades.add(skill)
            );
        }
    },
    mounted() {
        console.log(this.oldskills);
        document.querySelector('#skills').value = this.oldskills;
    },
    data: function(){
        return {

            habilidades: new Set()
        }
    },
    methods: {
        activar(e){

            if( e.target.classList.contains('bg-teal-400')){
                e.target.classList.remove("bg-teal-400");
                this.habilidades.delete(e.target.textContent);
            }else{
                e.target.classList.add('bg-teal-400');

                // Agregar al set de habilidades
                this.habilidades.add(e.target.textContent);
            }

            // Agregar las habilidades al input hidden

            // Se convierte el set en una string
            const stringHabilidades = [...this.habilidades];
            document.querySelector('#skills').value = stringHabilidades;
        },
        verificarClaseActiva(skill){
            return this.habilidades.has(skill) ? 'bg-teal-400' : '';
        },
        // addSkill(e){
        //     // console.log(e.target.value);

        //     var newNode = document.createElement('li');
        //     newNode.className = 'border-dashed border border-gray-500 px-10 py-3 rounded mr-4 mb-3 cursor-pointer';
        //     newNode.innerHTML = e.target.value;
        //     document.getElementById('skillplus').appendChild(newNode);
        //     e.target.value = '';

        //     // ---------------Clonar el ultimo hijo de la lista de skills---------------
        //     // var itm = document.getElementById("listskill").lastChild;
        //     // var cln = itm.cloneNode(true);
        //     // document.getElementById("listskill").appendChild(cln);


        // }
    }

}
</script>

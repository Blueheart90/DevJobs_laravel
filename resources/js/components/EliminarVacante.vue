<template>
    <button
        class="text-red-600 hover:text-red-900  mr-5"
        @click="eliminarVacante"
    >Eliminar</button>
</template>

<script>
    export default {
        props: ['vacanteId'],
        methods: {
            eliminarVacante(e){


                this.$swal.fire({
                    title: '¿Estas seguro?',
                    text: "Despues de ser eliminada, la vacante no podra ser recuperada",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {


                        // Enviar peticion a axios
                        const params = {
                            id: this.vacanteId,
                            _method: 'delete'
                        }
                        axios
                            .post(`/vacantes/${this.vacanteId}`, params)
                            .then(respuesta => {
                                // console.log(respuesta)
                                this.$swal.fire(
                                    'Eliminado',
                                    respuesta.data.mensaje,
                                    'success'
                                );
                                // Eliminar receta del DOM
                                this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);

                            })
                            .catch(error => {
                                console.log(error)
                            })
                    }
                });
            }

        },
    }
</script>

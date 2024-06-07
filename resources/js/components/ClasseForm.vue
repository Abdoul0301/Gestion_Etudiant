// resources/js/components/ClasseForm.vue

<template>
    <div>
        <form @submit.prevent="submitForm" method="post">
            <!-- Vos champs de formulaire ici -->
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            classe: {
                libelle: '',
                // Autres champs de votre classe
            }
        };
    },
    methods: {
        submitForm() {
            // Soumission du formulaire avec Vue.js
        }
    }
}
</script>

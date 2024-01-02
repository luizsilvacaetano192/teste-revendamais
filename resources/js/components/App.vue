<template>
    <div class="max-w-7xl mx-auto px-4 sm:px-3 lg:px-8 py-4">
        <div class="sm:px-3 border-black-900/10 text-white black-500 bg-black-50 dark:bg-red-700 lg:px-4 py-4 mx-auto space-y-4 sm:space-y-16">
            <h3> Teste Api e spa Revendamais </h3>   
        </div>
    </div>
     <zipCode>

     </zipCode>
    <fuzzySearch>

    </fuzzySearch>
</template>

<script>
    import fuzzySearch from '@/components/FuzzySearch.vue';
    import zipCode from '@/components/ZipCode.vue';

    export default {
        components: {
            fuzzySearch,
            zipCode
        },
    }
</script>
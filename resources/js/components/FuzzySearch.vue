<template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <form>
            <div class="space-y-12 sm:space-y-16">
                <div>
                    <div class="mt-10 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">
                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">fuzzy search</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <input type="text" name="fuzzy-search" id="fuzzy-search" v-model="fuzzySearch" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xl sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
</template>

<script>
    export default {
    
        data() {
            return {
                zipCode: '',
                street: '',
                neighborhood: '',
                city: '',
                state: '',
            }
        },
        watch: {
            fuzzySearch: function (val) {
                val = val.replace(/\D/g, '');

                if (val.length > 3) {
                    this.getFuzzySearchData(val);
                }
            }
        },
        methods: {
            getfuzzySearchData(fuzzySearch) {
                fetch('http://127.0.0.1:8000/api/v1/fuzzySearch/' + fuzzySearch)
                    .then(response => response.json())
                    .then(data => {
                        this.zipCode = data[0]['zip_code'];
                        this.street = data[0]['street'];
                        this.neighborhood = data[0]['neighborhood'];
                        this.city = data[0]['city'];
                        this.state = data[0]['state'];
                    })
                    .catch(error => console.error(error))
            }
        }
    }
</script>
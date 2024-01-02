<template>  
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="sm:px-3 border-gray-900/10 text-white gray-500 bg-gray-50 dark:bg-gray-700 lg:px-4 py-4 mx-auto space-y-4 sm:space-y-16">
            <h3> Pesquisa por Cep </h3>   
        </div>
        <div class="space-y-12 sm:space-y-16">
            <div class="mt-10 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">
                <div class="dark:bg-gray-700 mt-2 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                        <label for="zip-code" class="sm:px-3 py-4 sm:space-y-16 space-y-4 text-white block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">CEP</label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <input v-mask ="'#####-###'" type="text" name="zip-code" id="zip-code" v-model="zipCode" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <label for="zip-code" name="result-zip-code" id="result-zip-code"  class="text-white block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5"> {{ resultZipCode }}</label>
                        </div>
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                    <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Logradouro</label>
                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                        <input readonly type="text" name="street-address" id="street-address" v-model="street" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-offset-1 sm:max-w-xl sm:text-sm sm:leading-6" >
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                    <label for="neighborhood" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Bairro</label>
                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                        <input readonly type="text" name="neighborhood" id="neighborhood" v-model="neighborhood" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Cidade</label>
                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                        <input  readonly type="text" name="city" id="city" v-model="city" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                    <label for="state" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Estado</label>
                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                        <input readonly type="text" name="state" id="state" v-model="state" class=" gray-500 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>  
        </div>
    </div>
</template>

<script>

    import VueMask from 'v-mask';
    export default {

        directives: {VueMask},
        data() {
            return {
                zipCode: '',
                street: '',
                neighborhood: '',
                city: '',
                state: '',
                fuzzySearch: '',
                objSearch: {},
                resultZipCode:'',
            }
        },
        watch: {
            zipCode: function (val) {
                val = val.replace(/\D/g, '');
                if (val.length === 8) {
                    this.getZipCodeData(val);
                }
                else{
                    this.resultZipCode = '';
                    this.street = '';
                    this.neighborhood = '';
                    this.city = '';
                    this.state = '';
                }
            },
        },
        methods: {
           async getZipCodeData(zipCode) {
                const response = await fetch('api/v1/addresses?zip_code=' + zipCode);
                const data = await response.json();   
                if(response.ok){
                    this.resultZipCode = '';
                    this.zipCode = data['zip_code'];
                    this.street = data['street'];
                    this.neighborhood = data['neighborhood'];
                    this.city = data['city'];
                    this.state = data['state'];
                }
                else{
                    this.resultZipCode = data['message'];
                    this.street = '';
                    this.neighborhood = '';
                    this.city = '';
                    this.state = '';
                }
            },
        }  
    }  
</script>
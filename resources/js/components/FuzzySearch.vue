<template>
    <div class="sm:px-3 border-gray-900/10 text-white gray-500 bg-gray-50 dark:bg-gray-700 lg:px-4 py-4 mx-auto space-y-4 sm:space-y-16">
        <h3> Pesquisa por Endereço </h3>   
    </div>

    <div class="mt-10 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">
        <div class="dark:bg-gray-700 mt-10 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">
            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                <label for="fuzzy-search" class="sm:px-3 py-4 sm:space-y-16 space-y-4 text-white block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Busca</label>
                <div class=" mt-2 sm:col-span-2 sm:mt-0">
                    <input type="text" name="fuzzy-search" id="fuzzy-search" v-model="fuzzySearch" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xl sm:text-sm sm:leading-6">
                    <label for="fuzzy-search" name="result-search" id="result-search"  class="text-white block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5"> {{ resultSearch }}</label>
                </div>
            </div>
        </div>
    
        <div  v-show="showTableAdress">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Cep
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Logradouro
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Bairro
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cidade
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="item in objSearch"  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ item.zip_code }}
                            </th>
                            <td class="px-6 py-4">
                                {{ item.street }}
                            </td>
                            <td class="px-6 py-4">
                                {{ item.neighborhood }}
                            </td>
                            <td class="px-6 py-4">
                                {{ item.city }}
                            </td>
                            <td class="px-6 py-4">
                                {{ item.state }}
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
  //  import FuzzySearch from '@/components/FuzzySearch.vue'
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
                resultSearch: '',
                showTableAdress: false
            }
        },
        watch: {
            fuzzySearch: function (val) {
                if (val.length > 0) {
                    this.getfuzzySearchData(val);
                }
                else{
                    this.objSearch = {};
                    this.resultSearch = '';
                    this.showTableAdress = false;
                }
            }
        },
        methods: {
            async getfuzzySearchData(fuzzySearch) {
                const response = await fetch('api/v1/addresses/search?fuzzySearch=' + fuzzySearch);
                const data = await response.json();   
                if(response.ok){
                    this.objSearch = data;
                    this.resultSearch = 'Total de ' + this.objSearch.length + ' endereços encontrados';
                    if(this.objSearch.length > 0){
                        this.showTableAdress = true; 
                    }
                    else
                    {
                        this.showTableAdress = false;  
                    }
                }
                else{
                    this.resultSearch = data['message'];
                    this.objSearch = {};
                    this.showTableAdress = false;
                }
            }
        }  
    }  
</script>
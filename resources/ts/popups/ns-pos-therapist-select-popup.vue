<template>
    <div id="ns-pos-therapist-select-popup" class="ns-box shadow-xl w-4/5-screen md:w-2/5-screen xl:w-108">
        <div id="header" class="border-b ns-box-header text-center font-semibold text-2xl py-2">
            <h2>{{ __('Select Therapist') }}</h2>
        </div>
        <div class="relative">
            <div class="p-2 border-b ns-box-body flex justify-between text-primary">
                <div class="input-group flex-auto border-2 rounded">
                    <input ref="searchField" 
                           v-model="searchTherapistValue"
                        placeholder="Search Therapist" type="text" class="outline-none w-full p-2">
                </div>
            </div>

            <div class="h-3/5-screen xl:h-2/5-screen overflow-y-auto ns-scrollbar">
                <ul class="ns-vertical-menu">
                    <li class="p-2 text-center text-primary" v-if="therapist && therapist.length === 0">
                        {{ __('No customer match your query...') }}
                    </li>
                    <li v-for="therapist of therapist" :key="therapist.id"
                        class="cursor-pointer p-2 border-b text-primary flex justify-between items-center">
                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input v-bind:id="`checkbox-item-${therapist.id}`"  
                                type="checkbox" 
                                v-bind:value="therapist.id" 
                                v-model="therapistsId"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label v-bind:for="`checkbox-item-${therapist.id}`"
                                class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300 cursor-pointer"> 
                                {{ therapist.id }}  {{ therapist.full_name }}</label>
                        </div>
                    </li>
                </ul>
            </div>
            <div v-if="isLoading" class="z-10 top-0 absolute w-full h-full flex items-center justify-center">
                <ns-spinner size="24" border="8"></ns-spinner>
            </div>
            <div>
                <!-- <i class="las la-user-plus text-xl px-1"></i> -->
                <span @click="selectTherapist()"
                    class="flex items-center p-3 text-sm font-medium text-blue-600 border-t border-gray-200 rounded-b-lg bg-gray-50 dark:border-gray-600 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-blue-500 hover:underline">
                    Add Therapist
                </span>
            </div>
        </div>
    </div>
</template>
<script>
import { nsHttpClient, nsSnackBar } from '@/bootstrap';
import { __ } from '@/libraries/lang';
import { Popup } from '@/libraries/popup';
import resolveIfQueued from "@/libraries/popup-resolver";

export default {
    data() {
        return {
            searchTherapistValue: '',
            orderSubscription: null,
            order: {},
            debounceSearch: null,
            therapist: [],
            therapistsId: [],
            isLoading: false,
        }
    },
    computed: {
        customerSelected() {
            return false;
        }
    },
    watch: {
        searchTherapistValue(value) {
            clearTimeout(this.debounceSearch);
            this.debounceSearch = setTimeout(() => {
                this.searchTherepist(value);
            }, 500);
        }
    },
    mounted() {
        this.$popup.event.subscribe(action => {
            if (action.event === 'click-overlay') {
                this.resolveIfQueued(false);
            }
        });

        this.orderSubscription = POS.order.subscribe(order => {
            this.order = order;
        });

        this.getTherapist();

        this.$refs.searchField.focus();
    },
    destroyed() {
        this.orderSubscription.unsubscribe();
    },
    methods: {
        __,

        /**
         * if the popup is likely to be used
         * on a queue, using the resolveIfQueued
         * could help being notified when it's closed.
         */
        resolveIfQueued,

        selectTherapist(){
            this.$popupParams.onSubmit({
                    therapist  : this.therapistsId
                });
                this.$popup.close();
        },
        searchTherepist(value) {
            nsHttpClient.post('/api/nexopos/v4/therapist/search', {
                search: value
            }).subscribe(therapist => {
                therapist.forEach(therapist => therapist.selected = false);
                this.therapist = therapist;
            })
        },

        // createCustomerWithMatch( value ) {
        //     this.resolveIfQueued(false)
        //     Popup.show( nsPosCustomersVue, { name: value })
        // },

        getTherapist() {
            this.isLoading = true;

            nsHttpClient.get('/api/nexopos/v4/therapist/active')
                .subscribe({
                    next: therapist => {
                        this.isLoading = false;
                        therapist.forEach(therapist => therapist.selected = false);
                        this.therapist = therapist;
                    },
                    error: (error) => {
                        this.isLoading = false;
                    }
                });
        }
    }
}
</script>
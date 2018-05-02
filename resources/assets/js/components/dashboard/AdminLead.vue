<template>
    <div>
        <div
            class="bg-white rounded p-4 w-full border-l-4"
            :class="{
                'border-grey': lead.important === 0,
                'border-red': lead.important === 1
            }"
        >
            <div class="flex flex-wrap">
                <div class="w-auto flex-grow">
                    <p class="mb-2 text-grey-dark text-4xl ">{{lead.name}}</p>
                    <div class="flex flex-wrap">
                        <p class="mb-2 mr-4 p-1 text-grey-dark">
                            <a class="text-grey-darkest"
                               :href="'tel:' + lead.phone"
                            >
                                {{lead.phone}}
                            </a>
                        </p>
                        <p class="mb-2 mr-4 p-1 text-grey-dark">
                            <a class="text-grey-darkest"
                               :href="'mailto:' + lead.email"
                            >
                                {{lead.email}}
                            </a>
                        </p>
                    </div>
                    <p class="text-grey-darker leading-normal">{{lead.message}}</p>
                </div>
                <div class="w-full lg:w-80 p-4 mt-4 flex justify-between relative items-center text-grey-darker">
                    <a
                        @click="toggleImportant(lead.id)"
                        class="cursor-pointer text-center mr-4 w-16 h-16"
                        :class="{'text-red': lead.important}"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-bookmark h-6">
                            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <span class="block text-xs">Important</span>
                    </a>
                    <a
                        class="cursor-pointer hover:text-green text-center mr-4 w-16 h-16"
                        @click="getNotes(lead.id)"
                        v-if="!notesExpanded"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-file-text h-6">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <span class="block text-xs">Show&nbsp;Notes</span>
                    </a>
                    <a
                        class="cursor-pointer text-green hover:text-grey-darker text-center mr-4 w-16 h-16"
                        @click="notesExpanded = false"
                        v-if="notesExpanded"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-file h-6">
                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                            <polyline points="13 2 13 9 20 9"></polyline>
                        </svg>
                        <span class="block text-xs">Hide&nbsp;Notes</span>
                    </a>
                    <a
                        @click="archive(lead.id)"
                        class="cursor-pointer hover:text-red text-center mr-4 w-16 h-16"
                        v-if="lead.active"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-folder-plus h-6">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                            <line x1="12" y1="11" x2="12" y2="17"></line>
                            <line x1="9" y1="14" x2="15" y2="14"></line>
                        </svg>
                        <span class="block text-xs">Archive</span>
                    </a>
                    <a
                        @click="unarchive(lead.id)"
                        class="cursor-pointer hover:text-red text-center mr-4 w-16 h-16"
                        v-else
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-folder-minus h-6">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                            <line x1="9" y1="14" x2="15" y2="14"></line>
                        </svg>
                        <span class="block text-xs">Unarchive</span>
                    </a>
                </div>
            </div>
            <div v-if="notesExpanded" >
                <p class="text-grey-dark text-xl my-4 pt-4 border-t border-grey">Coming soon...</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            lead: {
                type: Object,
                default: () => { return this.lead }
            },
            currentPage: {
                type: Number,
                default: this.currentPage
            }
        },
        data(){
            return {
                notes: [],
                notesExpanded: false,
                leadPath: '/api/leads/' + this.lead.id
            }
        },
        methods: {
            archive(id) {
                axios.patch(this.leadPath, { active: 0 })
                        .then(() => {
                        this.$emit('archived', this.viewActiveLeads, this.viewImportantLeads, this.currentPage);
                });
            },
            unarchive(id) {
                axios.patch(this.leadPath, { active: 1 })
                    .then(response => {
                        this.$emit('unarchived', this.viewActiveLeads, this.viewImportantLeads, this.currentPage);
                    });
            },
            toggleImportant(id) {
                this.lead.important = ! this.lead.important;
                axios({
                    method: 'patch',
                    url: '/api/leads/' + id,
                    data: {
                        important: this.lead.important
                    }
                })
                    .then(() => {
                        let status = this.lead.active === 1;
                        this.$emit('important', status, this.currentPage);
                    })
            },
            getNotes(id) {
                let url = this.leadPath + '/notes';
                axios.get(url)
                    .then(response => {
                        this.notes = response.data;
                    });
                this.notesExpanded = true;
            }
        }
    }
</script>
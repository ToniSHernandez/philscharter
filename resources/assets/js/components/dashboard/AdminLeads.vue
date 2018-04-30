<template>
    <div>
        <div class="flex flex-wrap mt-4 pb-1 border-b border-grey-dark items-center justify-between">
            <h1 class="text-white text-5xl font-normal">Leads</h1>
            <admin-lead-filters
                @toggle="filter"
                :active-filter="activeFilter"
                :important-filter="importantFilter"
                class="flex w-auto flex-wrap justify-center"
            ></admin-lead-filters>
        </div>
        <div class="leads-list pt-4 pb-3">
            <admin-lead
                v-for="(lead, index) in leads"
                :key="lead.id"
                :lead="lead"
                class="mb-2"
                :index="index"
            ></admin-lead>
        </div>
        <admin-lead-pagination
                v-if="pagination.total != 0"
                @page="page"
                :pagination="pagination"
        />
    </div>
</template>

<script>
import Pagination from '../../models/pagination';
import LeadService from '../../services/leads.service';

export default {
    props: {},

    data() {
        return {
            pagination: new Pagination({
                next_page_url: '',
                prev_page_url: '',
                from: '',
                to: '',
                last_page: '',
                current_page: '',
                total: ''
            }),
            leads: [],
            leadService: new LeadService(),
            activeFilter: true,
            importantFilter: false
        }
    },

    mounted () {
        this.getActive();
    },

    watch: {
        activeFilter: function (active) {
            if (active) {
                this.getActive(this.importantFilter);
            } else {
                this.getArchived(this.importantFilter);
            }
        },
        importantFilter: function (important) {
            if (this.activeFilter) {
                this.getActive(important);
            } else {
                this.getArchived(important);
            }
        }
    },

    methods: {
        page(url) {
            this.leadService.getPage(url)
                .then(response => {
                    this.leads = response.data.data;
                    this.pagination = new Pagination(response.data);
                })
        },
        filter(attribute) {
            this[attribute] = !this[attribute];
        },
        getActive(important = this.importantFilter, page = 1) {
            this.leadService.activeLeads(important, page)
                .then(response => {
                    this.leads = response.data.data;
                    this.pagination = response.data;
                });
        },
        getArchived(important = this.importantFilter, page = 1) {
            this.leadService.archivedLeads(important, page)
                .then(response => {
                    this.leads = response.data.data;
                    this.pagination = response.data;
                });
        },
        refresh(active, page) {
            if (active) {
                this.getActive(this.importantFilter, page);
            } else {
                this.getArchived(this.importantFilter, page);
            }
        }
    }
}
</script>
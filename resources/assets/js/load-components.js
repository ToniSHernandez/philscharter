/*Dashboard*/
Vue.component('admin-contact-info', require('./components/dashboard/AdminContactInfo.vue'));
Vue.component('admin-lead', require('./components/dashboard/AdminLead.vue'));
Vue.component('admin-leads', require('./components/dashboard/AdminLeads.vue'));
Vue.component('admin-lead-filters', require('./components/dashboard/AdminLeadFilters.vue'));
Vue.component('admin-lead-pagination', require('./components/dashboard/AdminLeadPagination.vue'));
Vue.component('admin-pages', require('./components/dashboard/AdminPages.vue'));
Vue.component('admin-review', require('./components/dashboard/AdminReview.vue'));
Vue.component('admin-reviews', require('./components/dashboard/AdminReviews.vue'));
Vue.component('admin-review-fields', require('./components/dashboard/Reviewfields.vue'));
Vue.component('admin-service', require('./components/dashboard/Service.vue'));
Vue.component('admin-services', require('./components/dashboard/Services.vue'));
Vue.component('admin-service-fields', require('./components/dashboard/ServiceFields.vue'));
Vue.component('admin-dashboard', require('./components/dashboard/Dashboard.vue'));

/*Front-end*/
Vue.component('mini-form', require('./components/frontend/MiniForm.vue'));
Vue.component('trip-request', require('./components/frontend/TripRequest.vue'));
Vue.component('mini-service', require('./components/frontend/MiniService.vue'));
Vue.component('services', require('./components/frontend/Services.vue'));
Vue.component('reviews', require('./components/frontend/Reviews.vue'));
Vue.component('review', require('./components/frontend/Review.vue'));
Vue.component('photo-albums', require('./components/frontend/PhotoAlbums.vue'));
Vue.component('photo-album', require('./components/frontend/PhotoAlbum.vue'));
Vue.component('image-upload', require('./components/dashboard/ImageUpload.vue'));
Vue.component('google-map', require('./components/frontend/GoogleMap.vue'));
Vue.component('pin', require('./components/frontend/GoogleMapPin.vue'));
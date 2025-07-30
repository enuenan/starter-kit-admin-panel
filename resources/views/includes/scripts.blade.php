@stack('page-js')

<script src="{{ asset('dashboard/js/appearance.js') }}"></script>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('sidebar', {
            open: JSON.parse(localStorage.getItem('sidebarOpen')) ?? window.innerWidth >= 1024,
            toggle() {
                this.open = !this.open;
                localStorage.setItem('sidebarOpen', this.open);
            },
            close() {
                this.open = false;
                localStorage.setItem('sidebarOpen', false);
            }
        });
    });
</script>
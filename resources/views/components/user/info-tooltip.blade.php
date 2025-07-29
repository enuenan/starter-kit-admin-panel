@props(['user', 'show_property' => 'name'])

<div x-data="tooltip()" class="relative inline-block group" @mouseenter="show" @mouseleave="hide">
    <a href="{{ route('user.show', $user) }}" class="link link-success">
        {{ $user->{$show_property} }}
    </a>

    <!-- Tooltip -->
    <div x-ref="tooltip" x-show="visible" x-transition :style="tooltipStyle"
        class="absolute z-40 bg-base-200 text-base-content p-2 rounded shadow-lg w-max opacity-100"
        style="display: none;">
        <x-user.info :user="$user" />
    </div>

</div>

<script>
    function tooltip() {
        return {
            visible: false,
            tooltipStyle: '',
            show() {
                this.visible = true;
                this.$nextTick(() => this.setPosition());
            },
            hide() {
                this.visible = false;
            },
            setPosition() {
                const tooltip = this.$refs.tooltip;
                const trigger = tooltip.parentElement;

                const triggerRect = trigger.getBoundingClientRect();
                const tooltipRect = tooltip.getBoundingClientRect();

                const spaceBelow = window.innerHeight - triggerRect.bottom;
                const spaceAbove = triggerRect.top;

                const position = (spaceBelow < tooltipRect.height + 20 && spaceAbove > tooltipRect.height + 20)
                    ? 'top'
                    : 'bottom';

                // Calculate horizontal centering and clamp to viewport
                const left = Math.max(8, triggerRect.left + triggerRect.width / 2 - tooltipRect.width / 2);
                const top = (position === 'top')
                    ? (triggerRect.top - tooltipRect.height - 8)
                    : (triggerRect.bottom + 8);

                // Clamp right edge
                const maxLeft = window.innerWidth - tooltipRect.width - 8;
                const finalLeft = Math.min(left, maxLeft);

                this.tooltipStyle = `
                    position: fixed;
                    top: ${top}px;
                    left: ${finalLeft}px;
                `;
            }
        };
    }
</script>
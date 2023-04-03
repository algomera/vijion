@props([
	'options',
	'value',
])

<div
		:id="$id('select2multiple')"
		x-data="{
        multiple: true,
        value: @entangle($attributes->wire('model')),
        options: {{ $options }},
        init() {
            let bootSelect2 = () => {
                let selections = this.multiple ? this.value : [this.value]

                $(this.$refs.select).select2({
                    multiple: this.multiple,
                    data: this.options.map(i => ({
                        id: i.value,
                        text: i.label,
                        selected: selections.map(i => String(i)).includes(String(i.value)),
                    })),
                })
            }

            let refreshSelect2 = () => {
                $(this.$refs.select).select2('destroy')
                bootSelect2()
            }

            bootSelect2()

            $(this.$refs.select).on('change.select2', () => {
                let currentSelection = $(this.$refs.select).select2('data')

                this.value = this.multiple
                    ? currentSelection.map(i => i.id)
                    : currentSelection[0].id
            })

            $(this.$refs.select).on('select2:clearing', () => {
                console.log('clearing')
                refreshSelect2()
            })

            this.$watch('value', () => refreshSelect2())
            this.$watch('options', () => refreshSelect2())
        },
    }"
		class="min-w-sm w-full"
>
	<select x-ref="select" class="w-full"></select>
</div>
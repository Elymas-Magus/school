<template>
	<async-select
		ref="multiselect"
		v-model="selecteds"
		:options.sync="data.list"
		:url.sync="data.url"
		:multiple="multiple"
		:max="max"
		track-by="id"
		label="full_name"
		:placeholder="placeholder"
		:map-options="mapOptions"
		:filter-options="filterOptions"
		:disabled="disabled"
        :open-direction="openDirection"
		@input="$emit('input', selecteds)"
		@empty="emitEmpty"
	></async-select>
</template>

<script>
import AppMultiselectFilters from "@/global/Mixins/AsyncSelect/Filters";
export default {
	name: 'EscolasSelect',
	mixins: [AppMultiselectFilters],
	props: {
		url: {
			type: String,
			default() {
				return location.origin + '/ava/admin-users/listar-escolas-paginated';
			}
		},
		value: {
			type: Object|Array,
			required: false,
		},
		placeholder: {
			type: String,
			default() {
				return 'Selecionar Escola';
			}
		}
	},
}
</script>
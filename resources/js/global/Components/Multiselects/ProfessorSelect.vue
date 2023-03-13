<template>
	<async-select
		ref="multiselect"
		v-model="selecteds"
		:options.sync="data.list"
		:url.sync="data.url"
		:multiple="multiple"
		:max="max"
		:map-options="mapOptions"
		:filter-options="filterOptions"
		:placeholder="placeholder"
		:disabled="disabled"
		track-by="id"
		label="full_name"
		@input="$emit('input', selecteds)"
		@empty="emitEmpty"
	></async-select>
</template>

<script>
import AppMultiselectFilters from "@/global/Mixins/AsyncSelect/Filters";
export default {
	name: 'ProfessorSelect',
	mixins: [AppMultiselectFilters],
	props: {
		url: {
			type: String,
			default() {
				return location.origin + '/ava/professor/listar';
			}
		},
		placeholder: {
			type: String,
			default() {
				return 'Selecionar Professor';
			}
		},
		escolas: {
			type: Array,
			default() {
				return [];
			}
		},
		turmas: {
			type: Array,
			default() {
				return [];
			}
		},
	},
	watch: {
		escolas(newVal, oldVal) {
			if (!_.isEqual(newVal, oldVal)) {
				this.resetSelecteds();
				this.configUpdates(this.escolas, this.turmas);
			}
		},
		turmas(newVal, oldVal) {
			if (!_.isEqual(newVal, oldVal)) {
				this.resetSelecteds();
				this.configUpdates(this.escolas, this.turmas);
			}
		}
	},
	methods: {
		init() {
			this.configUpdates(this.escolas, this.turmas);
		},
		configUpdates(escolas, turmas) {
			if (!_.isEmpty(escolas) || !_.isEmpty(turmas)) {
				this.configUrl(_.map(escolas, 'id'), _.map(turmas, 'id'));
			} else if (this.enableAll || this.enableAllWhen()) {
				this.configUrl();
			} else {
				this.resetUrl();
			}
		},
		configUrl(escolas = [], turmas = []) {
			var url = this.url;

			if (!_.isEmpty(escolas)) {
				url = this.getFiltredUrl(url, 'escolas', escolas)
			}
			if (!_.isEmpty(turmas)) {
				url = this.getFiltredUrl(url, 'turmas', turmas)
			}

			this.setUrl(url);
		}
	}
}
</script>
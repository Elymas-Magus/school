<template>
	<async-select
		ref="multiselect"
		v-model="selecteds"
		:options.sync="data.list"
		:url.sync="data.url"
		:multiple="multiple"
		:max="max"
		track-by="id"
		label="nome"
		:placeholder="placeholder"
		:map-options="mapOptions"
		:filter-options="filterOptions"
        :open-direction="openDirection"
		:disabled="disabled"
		@input="$emit('input', selecteds)"
		@empty="emitEmpty"
	></async-select>
</template>

<script>
import AppMultiselectFilters from "@/global/Mixins/AsyncSelect/Filters";
export default {
	name: 'TurmaSelect',
	mixins: [AppMultiselectFilters],
	props: {
		url: {
			type: String,
			default() {
				return location.origin + '/ava/turmas/listar-turmas-paginated';
			}
		},
		placeholder: {
			type: String,
			default() {
				return 'Selecionar Turmas';
			}
		},
		escolas: {
			type: Array,
			default() {
				return [];
			}
		},
		periodosLetivos: {
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
				this.configUpdates(this.escolas, this.periodosLetivos);
			}
		},
		periodosLetivos(newVal, oldVal) {
			if (!_.isEqual(newVal, oldVal)) {
				this.resetSelecteds();
				this.configUpdates(this.escolas, this.periodosLetivos);
			}
		}
	},
	methods: {
		init() {
			this.configUpdates(this.escolas, this.periodosLetivos);
		},
		configUpdates(escolas, periodosLetivos) {
			if (!_.isEmpty(periodosLetivos) || !_.isEmpty(escolas)) {
				this.configUrl(
					escolas.map(escola => escola.id),
					periodosLetivos.map(periodo => periodo.id),
				);
			} else if (this.enableAll || this.enableAllWhen()) {
				this.configUrl();
			} else {
				this.resetUrl();
			}
		},
		configUrl(escolas = [], periodosLetivos = []) {
			var url = this.url;

			if (!_.isEmpty(escolas)) {
				url = this.getFiltredUrl(url, 'escolas', escolas)
			}
			if (!_.isEmpty(periodosLetivos)) {
				url = this.getFiltredUrl(url, 'periodoLetivo', periodosLetivos)
			}
			this.setUrl(url);
		}
	}
}
</script>
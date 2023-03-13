<template>
	<async-select
		ref="multiselect"
		v-model="selecteds"
		:options.sync="data.list"
		:url.sync="data.url"
		:multiple="multiple"
		:max="max"
		track-by="id"
		label="item"
		:placeholder="placeholder"
		:map-options="mapOptions"
		:filter-options="filterOptions"
		:disabled="disabled"
		@input="$emit('input', selecteds)"
		@empty="emitEmpty"
	></async-select>
</template>

<script>
import AppMultiselectFilters from "@/global/Mixins/AsyncSelect/Filters";
export default {
	name: 'CategorizacaoSelect',
	mixins: [AppMultiselectFilters],
	props: {
		url: {
			type: String,
			default() {
				return location.origin + '/ava/categorizacoes';
			}
		},
		placeholder: {
			type: String,
			default() {
				return 'Selecionar Categorização';
			}
		},
		categorizacoes: {
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
		turmas: {
			type: Array,
			default() {
				return [];
			}
		},
	},
	watch: {
		categorizacoes(newVal, oldVal) {
			if (!_.isEqual(newVal, oldVal)) {
				this.resetSelecteds();
				this.configUpdates(this.categorizacoes, this.periodosLetivos, this.turmas);
			}
		},
		periodosLetivos(newVal, oldVal) {
			if (!_.isEqual(newVal, oldVal)) {
				this.resetSelecteds();
				this.configUpdates(this.categorizacoes, this.periodosLetivos, this.turmas);
			}
		},
		turmas(newVal, oldVal) {
			if (!_.isEqual(newVal, oldVal)) {
				this.resetSelecteds();
				this.configUpdates(this.categorizacoes, this.periodosLetivos, this.turmas);
			}
		}
	},
	methods: {
		init() {
			this.configUpdates(this.categorizacoes, this.periodosLetivos, this.turmas);
		},
		configUpdates(categorizacoes, periodosLetivos, turmas) {
			if (!_.isEmpty(categorizacoes) || !_.isEmpty(periodosLetivos) || !_.isEmpty(turmas)) {
				this.configUrl(
					categorizacoes.map(categorizacao => categorizacao.id),
					periodosLetivos.map(periodoLetivo => periodoLetivo.id),
					turmas.map(turma => turma.id)
				);
			} else if (this.enableAll || this.enableAllWhen()) {
				this.configUrl();
			} else {
				this.resetUrl();
			}
		},
		configUrl(categorizacoes = [], periodosLetivos = [], turmas = []) {
			var url = this.url;

			if (!_.isEmpty(categorizacoes)) {
				url = this.getFiltredUrl(url, 'categorizacoes', categorizacoes)
			}
			if (!_.isEmpty(periodosLetivos)) {
				url = this.getFiltredUrl(url, 'periodosLetivos', periodosLetivos)
			}			
			if (!_.isEmpty(turmas)) {
				url = this.getFiltredUrl(url, 'turmas', turmas)
			}

			this.setUrl(url);
		}
	}
}
</script>
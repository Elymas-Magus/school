<template>
    <multiselect
		ref="multiselect"
        v-model="selecteds"
        :max="max"
        :allow-empty="allowEmpty"
        :block-keys="blockKeys"
        :options="mOptions"
        :option-height="optionHeight"
        :options-limit="optionsLimit"
        :multiple="multiple"
        :searchable="searchable"
        :loading="loading"
        :internal-search="internalSearch"
        :clear-on-select="clearOnSelect"
        :close-on-select="closeOnSelect"
        :limit="limit"
        :limit-text="limitText"
        :max-height="maxHeight"
        :show-no-results="showNoResults"
        :hide-selected="hideSelected"
        :track-by="trackBy"
        :label="label"
        :tag-placeholder="tagPlaceholder"
        :placeholder="placeholder"
        :taggable="taggable"
        :custom-label="customLabel"
        :show-labels="showLabels"
        :group-values="groupValues"
        :group-label="groupLabel"
        :group-select="groupSelect"
        :value="value"
        :reset-after="resetAfter"
        :disabled="disabled"
        :select-label="selectLabel"
        :select-group-label="selectGroupLabel"
        :selected-label="selectedLabel"
        :deselect-label="deselectLabel"
        :deselect-group-label="deselectGroupLabel"
        :preserve-search="preserveSearch"
        :preselect-first="preselectFirst"
        :name="name"
        :tabindex="tabindex"
        :open-direction="mOpenDirection"
        @input="input"
        @select="select"
        @remove="remove"
        @search-change="searchChange"
        @tag="tag"
		@open="open"
        @close="close"
    >
        <template #option="{ option, search }" v-if="hasOptionSlots">
            <slot
                name="option"
                :option="option"
                :search="search"
            ></slot>
        </template>
        <template #maxElements v-if="hasMaxElementsSlots">
            <slot name="maxElements"></slot>
        </template>
        <template #noResult v-if="hasNoResultSlots">
            <slot name="noResult"></slot>
        </template>
        <template #noOptions v-if="hasNoOptionsSlots">
            <slot name="noOptions"></slot>
        </template>
        <template #caret="{ toggle }" v-if="hasCaretSlots">
            <slot
				name="caret"
                :toggle="toggle"
            ></slot>
        </template>
        <template #singleLabel v-if="hasSingleLabelSlots">
            <slot name="singleLabel"></slot>
        </template>
        <template #placeholder v-if="hasPlaceholderSlots">
            <slot name="placeholder"></slot>
        </template>
        <template #limit v-if="hasLimitSlots">
            <slot name="limit"></slot>
        </template>
        <template #clear="{ search }" v-if="hasClearSlots">
            <slot
				name="clear"
                :search="search"
            ></slot>
        </template>
        <template #tag="{ option, search, remove }" v-if="hasTagSlots">
            <slot
				name="tag"
                :option="option"
                :search="search"
                :remove="remove"
            ></slot>
        </template>
        <template #beforeList v-if="hasBeforeListSlots">
            <slot name="beforeList"></slot>
        </template>
        <template #afterList>
            <slot name="afterList"></slot>
            <div v-observe-visibility="ended" v-if="hasUnloadedOptions && !searching">
                <div class="text-center my-2">
                    <em class="fa fa-spinner"></em>
                </div>
            </div>
        </template>
    </multiselect>
</template>

<script>
export default {
    name: 'AsyncSelect',
    props: {
        id: {
            type: Number|String,
        },	
        options: {
            type: Array,
            required: true,
        },
        optionsLimit: {
            type: Number,
            required: false,
            default: 1000,
        },
        optionHeight: {
            type: Number|String,
            required: false,
            default: 40,
        },
        maxHeight: {
            type: Number|String,
            required: false,
            default: 300,
        },
        searchable: {
            type: Boolean,
            required: false,
            default: true,
        },
        closeOnSelect: {
            type: Boolean,
            required: false,
            default: true,
        },
        clearOnSelect: {
            type: Boolean,
            required: false,
            default: true,
        },
        showLabels: {
            type: Boolean,
            required: false,
            default: true,
        },
        showNoResults: {
            type: Boolean,
            required: false,
            default: true,
        },
        showPointer: {
            type: Boolean,
            required: false,
            default: true,
        },
        trackBy: {
            type: String,
            required: true,
        },
        label: {
            type: String,
            required: true,
        },
        tagPlaceholder: {
            type: String,
            required: false,
            default() {
                return 'Pressione enter para criar uma marcação';
            }
        },
        tagPosition: {
            type: String,
            required: false,
            default() {
                return 'top';
            }
        },  
        placeholder: {
            type: String,
            required: false,
            default() {
                return 'Selecione uma opção';
            }
        },
        limit: {
            type: Number,
            required: false,
            default: 99999,
        },
        internalSearch: {
            type: Boolean,
            required: false,
            default: true,
        },
        hideSelected: {
            type: Boolean,
            required: false,
            default: false,
        },
        loading: {
            type: Boolean,
            required: false,
            default: false,
        },
        limitText: {
            type: Function,
            required: false,
            default() {
                return count => `e ${count} a mais`;
            }
        },
        multiple: {
            type: Boolean,
            required: false,
            default: false,
        },
        taggable: {
            type: Boolean,
            required: false,
            default: false,
        },
        customLabel: {
            type: Function,
            required: false,
        },
        groupValues: {
            type: String,
            required: false,
        },
        groupLabel: {
            type: String,
            required: false,
        },
        groupSelect: {
            type: Boolean,
            required: false,
            default: false,
        },
        resetAfter: {
            type: Boolean,
            required: false,
            default: false,
        },
        max: {
            type: Number,
            required: false,
        },
        allowEmpty: {
            type: Boolean,
            required: false,
            default: true,
        },
        blockKeys: {
            type: Array,
            required: false,
            default() {
                return [];
            }
        },
        disabled: {
            type: Boolean,
            required: false,
            default: false,
        },
        selectLabel: {
            type: String,
            required: false,
            default() {
                return 'Pressione enter para selecionar';
            }
        },
        selectGroupLabel: {
            type: String,
            required: false,
            default() {
                return 'Pressione enter para selecionar grupo';
            }
        },
        selectedLabel: {
            type: String,
            required: false,
            default() {
                return 'Selecionado';
            }
        },
        deselectLabel: {
            type: String,
            required: false,
            default() {
                return 'Pressione enter para remover';
            }
        },
        deselectGroupLabel: {
            type: String,
            required: false,
            default() {
                return 'Pressione enter to deselecionar grupo';
            }
        },
        preserveSearch: {
            type: Boolean,
            required: false,
            default: false,
        },
        preselectFirst: {
            type: Boolean,
            required: false,
            default: false,
        },
        name: {
            type: String,
            required: false,
            default() {
                return '';
            }
        },
        tabindex: {
            type: Number,
            required: false,
            default: 0,
        },
        openDirection: {
            type: String,
            required: false,
            default() {
                return '';
            }
        },
        value: {
            type: Object|String|Number,
            required: false,
        },
        url: {
            type: String|null,
            required: true,
        },
        onEnded: {
            type: Function,
            required: false,
        },
        hasCustomSearch: {
            type: Boolean,
            default: false,
        },
        mapOptions: {
            type: Function,
            required: false,
            default: (val) => val,
        },
        hasFilterApi: {
            type: Boolean,
            default: false,
        },
        filterOptions: {
            type: Function,
            required: false,
            default: (val) => true,
        },
        sortOptions: {
            type: Function,
            required: false,
        },
        filterApi: {
            type: Object,
            default() {
                return {};
            }
        },
        debug: {
            type: String,
            required: false,
        }
    },
    data() {
        return {
            mOptions: this.options,
            mOpenDirection: this.openDirection,
            hasUnloadedOptions: true,
            selecteds: this.value || '',
            pagination: {
                state: {
                    per_page: this.$cookie.get('per_page') || 10, // required
                    current_page: 1, // required
                    last_page: 1, // required
                    from: 1,
                    to: 10 // required
                },
            },
            initialPagination: {},
            orderBy: {
                column: 'id',
                direction: 'asc'
            },
            filters: {},
            lastAcessedPage: undefined,
            searching: false,
            hasNext: true,
            untreatedOptions: undefined,
        }
    }, 
    computed: {
        hasOptionSlots() {
            return !!this.$scopedSlots['option'];
        },
        hasMaxElementsSlots() {
            return !!this.$scopedSlots['maxElements'];
        },
        hasNoResultSlots() {
            return !!this.$scopedSlots['noResult'];
        },
        hasNoOptionsSlots() {
            return !!this.$scopedSlots['noOptions'];
        },
        hasCaretSlots() {
            return !!this.$scopedSlots['caret'];
        },
        hasSingleLabelSlots() {
            return !!this.$scopedSlots['singleLabel'];
        },
        hasLimitSlots() {
            return !!this.$scopedSlots['limit'];
        },
        hasClearSlots() {
            return !!this.$scopedSlots['clear'];
        },
        hasTagSlots() {
            return !!this.$scopedSlots['tag'];
        },
        hasBeforeListSlots() {
            return !!this.$scopedSlots['beforeList'];
        },
        hasAfterListSlots() {
            return !!this.$scopedSlots['afterList'];
        },
        hasPlaceholderSlots() {
            return !!this.$scopedSlots['placeholder'];
        },
    },
    created() {
        this.initialPagination = { ...this.pagination.state };
    },
    updated() {
        this.selecteds = this.value;
    },
    watch: {
        url() {
            this._log(this.url);
            this.resetOptions();
        },
        value(newVal) {
            this.selecteds = this.value;
        },
        selecteds(newlVal) {
            this.mOptions = _.filter(this.options, this.filterOptions);
        },
        hasFilterApi(value) {
            if (value === true) {
                this.filters = _.assign(this.filters, this.filterApi);
            } else {
                this.filters = _.omit(this.filters, _.keys(this.filterApi));
            }
        },
        filterApi(newVal, oldVal) {
            if (this.hasFilterApi === true && newVal) {
                this.mOptions = [];
                this.hasUnloadedOptions = true;
                this.filters = _.omit(this.filters, _.keys(oldVal));
                this.filters = _.assign(this.filters, newVal);
            }
        },
        max() {
            this.hasUnloadedOptions = this.max == undefined || this.max < this.selecteds;
        },
		mOptions(newVal) {
            this._log('watcher', this.mOptions);
			this.$emit('empty', _.isEmpty(newVal));
		}
    },
    methods: {
        _log() {
            if (this.debug != undefined) {
                console.log(`[DEBUG ${this.debug}] -`, [...arguments]);
            }
        },
        updateOptions() {
            this.$emit('update:options', this.mOptions);
        },
        optionsTreament(options) {
            var items = _.filter(_.map(options, this.mapOptions), this.filterOptions);

            if (!this.sortOptions) {
                return items;
            }

            return _.sortBy(items, this.sortOptions);
        },
        setOptions(options) {
            this.untreatedOptions = options;
            this.mOptions = this.optionsTreament(options);
            this.$emit('update:options', this.mOptions);
        },
        tag(searchQuery, id) {
            this.$emit('tag', searchQuery, id);
        },
        searchChange(searchQuery, id) {
            if (this.hasCustomSearch) {
                this.$emit(
                    'search-change',
                    searchQuery,
                    this.pagination.state,
                    this.setOptions,
                    this.hasUnloadedOptions
                );
            } else {
                this.onSearch(searchQuery);
            }
        },
        resetOptions() {
            this.mOptions = [];
            this.untreatedOptions = [];
            this.updateOptions();
            this.resetPagination();
            this.hasUnloadedOptions = true;
            this._log('reset options', this.mOptions);
        },
        resetPagination() {
            this.pagination.state = { ...this.initialPagination };
        },
        input(value, id) {
            this.$emit('input', value, id);
        },
        select(selectedOption, id) {
            this.$emit('select', selectedOption, id);
        },
        remove(removedOption, id) {
            this.$emit('remove', removedOption, id);
        },
        open(id) {
            this.mOptions = this.optionsTreament(this.untreatedOptions);
            this._log('open', this.mOptions);
            this.$emit('open', id);
        },
        close(value, id) {
            this._log('close');
            this.$emit('close', value, id);
        },
        activate() {
            this.$refs.multiselect.activate();
        },
        deactivate() {
            this.$refs.multiselect.deactivate();
        },
        focus() {
            this.$refs.multiselect.$el.focus();
        },
        blur() {
            this.$refs.multiselect.$refs.search.blur();
        },
        ended(isVisible, entry) {
            if (isVisible && !this.searching) {
                if (this.onEnded) {
                    this.onEnded(this);
                } else {
                    this.loadOptions();
                    this._log('end', this.url, this.mOptions);
                }                   
            }
        },         	
        loadOptions(resetCurrentPage = false, url = null) {
            const oldData = this.mOptions;
            const nextUrl = url || this.url;

            if (_.isEmpty(nextUrl)) {
                this.hasUnloadedOptions = false; return;
            }

            var request = {
                params: {
                    per_page: this.pagination.state.per_page,
                    page: this.pagination.state.current_page,
                    orderBy: this.orderBy.column,
                    orderDirection: this.orderBy.direction
                }
            };

            if (resetCurrentPage === true) {
                request.params.page = 1;
            }

            this._log(`loadOptions: `, request, this.mOptions);
            _.assign(request.params, this.filters);
            axios.get(nextUrl, request).then(response => {
                this.populateCurrentStateAndData(oldData, response.data.data);
            }).catch(error => {
                this.setOptions(oldData);
                this.setSearching(false);
                this.hasUnloadedOptions = false;
            });
        },
        populateCurrentStateAndData(oldData, object) {
            const { data: newData } = object;

            if (object.current_page > object.last_page && object.total > 0) {
                this.pagination.state.current_page = object.last_page;
                this.loadOptions();
            } else {
                this.setOptions(_.uniqBy(_.concat(oldData, newData), this.trackBy));
                this.pagination.state.current_page = object.current_page + 1;
                this.pagination.state.last_page = object.last_page;
                this.pagination.state.total = object.total;
                this.pagination.state.per_page = object.per_page;
                this.pagination.state.to = object.to;
                this.pagination.state.from = object.from;
                this.hasUnloadedOptions = !!object.next_page_url;
            }

            this._log(`populateCurrentStateAndData: `, this.mOptions, this.pagination);
            this.setSearching(false);
        },
        onSearch(searchQuery) {
            this.setSearching(true);
            if (this.lastAcessedPage === undefined) {
                this.lastAcessedPage = this.pagination.state.current_page;
            }
            if (searchQuery == '') {
                this.pagination.state.current_page = this.lastAcessedPage + 1;
                this.lastAcessedPage = undefined;
            }

            this.filter('search', searchQuery, searchQuery != '');
        },
        filter(column, value, reload = true) {
            if (value == '') {
                delete this.filters[column];
            } else {
                this.filters[column] = value;
            }
            // when we change filter, we must reset pagination, because the total items count may has changed
            if (reload) {
                this.loadOptions(true);
            }
        },
        setSearching(searching) {
            this.searching = searching;
        },
        setHasUnloadedOptions(value) {
            this.hasUnloadedOptions = value;
        }
    }
}
</script>

<style lang="scss" scoped></style>
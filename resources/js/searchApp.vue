<template>
  <div>
    <div class="container">
      <ais-instant-search
        :search-client="searchClient"
        index-name="products"
      >
        <div class="search-panel">

          <div class="search-panel__results">
            <ais-search-box placeholder="Search here…" class="searchbox" />
            <ais-hits>
              <template slot="item" slot-scope="{ item }">
                <h1><ais-highlight :hit="item" attribute="productName" /></h1>
              </template>
            </ais-hits>
          </div>
        </div>
      </ais-instant-search>
    </div>
  </div>
</template>

<script>
import algoliasearch from 'algoliasearch/lite';

export default {
  data() {
    return {
      searchClient: algoliasearch(
        '4ZSPKA1BKX',
        'da7b837e571388028534e0a7440cfb5d'
      ),
    };
  },
};
</script>

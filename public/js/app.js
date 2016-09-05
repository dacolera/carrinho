var client = algoliasearch('YNF5U8HPAL', 'cc9f4bfdc2a20ba8d70b510763e07c93')
  var index = client.initIndex('produtos');
  autocomplete('#search-input', { hint: false }, [
    {
      source: autocomplete.sources.hits(index, { hitsPerPage: 5 }),
      displayKey: 'nome',
      templates: {
        suggestion: function(suggestion) {
          return suggestion._highlightResult.nome.value;
        }
      }
    }
  ]).on('autocomplete:selected', function(event, suggestion, dataset) {
    console.log(suggestion, dataset);
  });

  $(function(){
    $('.temp').fadeOut(3000);
  });
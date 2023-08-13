// Auto Generate Slug
$(document).ready(function() {
    $('#title').on('input', function() {
      var title = $(this).val();
      var slug = generateSlug(title);
      $('#slug').val(slug);
    });
      
    function generateSlug(text) {
      return text
        .toLowerCase()
        .replace(/[^\w\s-]/g, '')
        .trim()
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-');
    }
  });
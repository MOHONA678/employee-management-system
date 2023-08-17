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
// Delete Data
function del(e, t) {
  e.preventDefault();
  let c = confirm("Are you sure?");
  if (!c) return;
  t.closest('form').submit();
}

// Format Phone Number
function formatPhoneNumber(input) {
  let phoneNumber = input.value;
  phoneNumber = phoneNumber.replace(/\D/g, '');
  phoneNumber = phoneNumber.substring(0, 13);
  const countryCode = phoneNumber.substring(0, 2);
  const operator = phoneNumber.substring(2, 5);
  const prefix = phoneNumber.substring(5, 7);
  const lineNumber = phoneNumber.substring(7);
  if (phoneNumber.length > 7) {
    phoneNumber = `+${countryCode} (${operator}) ${prefix}-${lineNumber}`;
  } else if (phoneNumber.length > 5) {
    phoneNumber = `+${countryCode} (${operator}) ${prefix}`;
  } else if (phoneNumber.length > 2) {
    phoneNumber = `+${countryCode} (${operator})`;
  } else {
    phoneNumber = `+${countryCode}`;
  }
  input.value = phoneNumber;
}
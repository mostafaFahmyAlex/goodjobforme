(function (api) {
  // Extends our custom "job_stack-upgrade" section.
  api.sectionConstructor["job_stack-upgrade"] = api.Section.extend({
    // No events for this type of section.
    attachEvents: function () {},

    // Always make the section active.
    isContextuallyActive: function () {
      return true;
    },
  });
})(wp.customize);

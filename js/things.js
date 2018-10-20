function() {
  this.currentView = 0;
  this.$element.blur();

  this.initDates();

  this.show();

  if (this.params.date) {
    this.$dtpElement.find('.dtp-date').removeClass('hidden');
    this.initDate();
  } else {
    if (this.params.time) {
      this.$dtpElement.find('.dtp-time').removeClass('hidden');
      this.initHours();
    }
  }
}

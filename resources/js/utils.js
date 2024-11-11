export function formatNumber(number) {
    return number.toLocaleString('en', { minimumFractionDigits: 3, maximumFractionDigits: 3 }).replace(/,/g, ' ');
}

export function cleanNumber(value) {
    return (value || '').replace(/ /g, '');
}

export function formatInputs() {
    $('input').on('input', function() {
        this.value = this.value.replace(/[^0-9,.]/g, '');
    });
}
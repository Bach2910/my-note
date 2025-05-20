function selectOption(value) {
    localStorage.setItem('selectedOption', value);
    if (value === 'value-1') {
        window.location.href = "{{ route('students.index') }}";
    } else if (value === 'value-2') {
        window.location.href = "{{ route('classes.index') }}";
    } else if (value === 'value-3') {
        window.location.href = "{{ route('list-account') }}";
    } else if (value === 'value-4') {
        window.location.href = "{{ route('roles.index') }}";
    } else if (value === 'value-5') {
        window.location.href = "{{ route('api.student') }}";
    }
}

window.addEventListener('DOMContentLoaded', () => {
    const selectedValue = localStorage.getItem('selectedOption');
    if (selectedValue) {
        const input = document.querySelector(`input[value="${selectedValue}"]`);
        if (input) input.checked = true;
    }
});

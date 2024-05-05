$(document).ready(function() {
    $('#postal-code-input').on('input', function() {
        const postalCode = $(this).val();

        $.ajax({
            type: 'POST',
            url: 'index',
            data: {
                action: 'fetchTowns',
                postalCode: postalCode
            },
            success: function(response) {
                const citySelect = $('#city-select');
                citySelect.empty();

                const towns = JSON.parse(response);
                towns.forEach(function(town) {
                    citySelect.append($('<option>', {
                        value: town.idtown,
                        text: town.town
                    }));
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    $('#city-select').on('change', function() {
        const idtown = $(this).val();
        const streetInput = $('#street-input');
        const streetName = streetInput.val();

        if (idtown && streetName) {
            $.ajax({
                type: 'POST',
                url: 'index',
                data: {
                    action: 'fetchStreets',
                    idtown: idtown,
                    streetName: streetName
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
    $('#house-number-select').on('change', function() {
    const idtown = $('#city-select').val();
    const streetName = $('#street-input').val(); 
    const number = $(this).val(); 

    if (idtown && streetName && number !== '') { 
        $.ajax({
            type: 'POST',
            url: 'index',
            data: {
                action: 'fetchStreets',
                idtown: idtown,
                streetName: streetName
            },
            success: function(response) {
                const streetResponse = JSON.parse(response);
                const idstreet = streetResponse[0].idstreet; 
                fetchHouseNumbers(idtown, idstreet, number);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
});

function fetchHouseNumbers(idtown, idstreet, number) {
    if (idtown && idstreet && number !== '') {
        $.ajax({
            type: 'POST',
            url: 'index',
            data: {
                action: 'fetchHouseNumbers',
                idtown: idtown,
                idstreet: idstreet,
                number: number 
            },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
}


$('#street-input').on('input', function() {
    const idtown = $('#city-select').val();
    const streetName = $(this).val();
    const streetInput = $(this);
    const streetSuggestions = $('#street-suggestions');

    if (idtown && streetName) {
        $.ajax({
            type: 'POST',
            url: 'index',
            data: {
                action: 'fetchStreets',
                idtown: idtown,
                streetName: streetName
            },
            success: function(response) {
                const streets = JSON.parse(response);
                streetSuggestions.empty(); 

                if (streets.length > 0) {
                    streets.forEach(function(street) {
                        streetSuggestions.append($('<option>', {
                            value: street.street_official
                        }));
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
});
});
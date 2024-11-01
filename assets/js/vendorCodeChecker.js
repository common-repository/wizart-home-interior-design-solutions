function createVendorCodeChecker() {
    let cachedResult = null;
    let fetchPromise = null;

    return function(apiUrl, vendorCode, apiToken, className) {
        if (cachedResult !== null) {
            return Promise.resolve(cachedResult);
        }

        if (fetchPromise !== null) {
            return fetchPromise;
        }

        const url = `${apiUrl}?vendor_code[]=${encodeURIComponent(vendorCode)}&api_token=${apiToken}`;

        fetchPromise = fetch(url)
            .then(response => response.json())
            .then(data => {
                const vendor_codes = data.data.vendor_codes;
                for (let el in vendor_codes) {
                    cachedResult = vendor_codes[el];
                    return cachedResult;
                }
            })
            .catch(error => {
                console.error('Error fetching vendor codes:', error);
                cachedResult = false;
                return cachedResult;
            });

        return fetchPromise;
    };
}

const checkVendorCodes = createVendorCodeChecker();
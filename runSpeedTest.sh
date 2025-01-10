#!/bin/bash

while [[ "$#" -gt 0 ]]; do
    case $1 in
        -token) BEARER_TOKEN="$2"; shift ;; # Capture the token value
        *) echo "Unknown parameter passed: $1"; exit 1 ;;
    esac
    shift
done

if [ -z "$BEARER_TOKEN" ]; then
    echo "Error: Bearer token is required."
    echo "Usage: ./run_speed_test.sh -token \"your_bearer_token\""
    exit 1
fi

API_URL="http://internetspeedreport.test/api/v1/data/"

echo "Running speed test..."

response=$(curl -s -X POST "$API_URL" \
  -H "Authorization: Bearer $BEARER_TOKEN" \
  -H "Content-Type: application/json")

if [[ $response == *"New Data created"* ]]; then
    echo "Success: $response"
else
    echo "Error: Unable to create new data."
    echo "Response: $response"
fi

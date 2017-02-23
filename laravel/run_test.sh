#!/bin/sh

set -eu

# check selenium.local is up & availble
func() {
  url=selenium.local:4444
  if curl --output /dev/null --silent --head --fail "$url"; then
    echo 1
  else
    echo 0
  fi
}


# try 10 times to check selenium.local is up.
for i in `seq 1 10 `
do
  if [ `func` -eq 1 ]; then
    php artisan dusk
    exit 1
  else
    echo 'selenium is down... wait for boot'
    sleep 10
  fi
done

echo '[timeout] test runner. could not execute dusk test.'
exit 0


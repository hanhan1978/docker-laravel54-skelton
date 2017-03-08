#!/bin/sh

set -eu

ping selenium.local -c 1

# check selenium.local is up & availble
func() {
  url=selenium.local:4444
  if curl --output /dev/null --silent --head --fail "$url"; then
    echo 0
  else
    echo 1
  fi
}


# try 10 times to check selenium.local is up.
for i in `seq 1 10 `
do
  if [ `func` -eq 0 ]; then
    php artisan dusk
    exit 0
  else
    echo 'selenium is down... wait for boot'
    sleep 10
  fi
done

echo '[timeout] test runner. could not execute dusk test.'
exit 1


#!/bin/bash
for solution in $(seq -w 1 25)
do
  for runCounter in $(seq 1 5)
  do
    filename="src/day${solution}/day${solution}.php"
    if [[ -f $filename ]]; then
      echo "> Running solution $solution/25 run $runCounter/5"
      php "${filename}"
      echo "> End running solution $solution/25 run $runCounter/5"
      sleep 1
    fi
    ((ctr++))
  done
done

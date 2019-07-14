# Pet Store Auth Service

## Overview
The authentication service is a simple hash based check on a predefined list of string values. Upon execution the relative directory is searched for a file named `secrets.txt` which should contain a list of valid plain passwords (refer to `secrets.example.txt`). 

Each password is converted to a hash value and stored in memory as authentication tokens. This token is then used to verify incoming request as per the entire application.
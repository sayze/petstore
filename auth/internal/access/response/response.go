package response

import (
	"encoding/json"

	"bitbucket.org/petstore/internal/models"
)

const (
	// StatusOk response fine
	StatusOk = "OK"
	// StatusError response pooped itself
	StatusError = "ERROR"
	// StatusInvalid got some funky data
	StatusInvalid = "Invalid"
)

/*
Build helper to populate a response struct and return as json.
*/
func Build(status string, message string, value string) ([]byte, error) {
	return json.Marshal(models.Response{Status: status, Message: message, Value: value})

}

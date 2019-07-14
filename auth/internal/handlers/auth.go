package handlers

import (
	"encoding/json"
	"net/http"

	ra "bitbucket.org/petstore/internal/access/response"
	ta "bitbucket.org/petstore/internal/access/token"
	"bitbucket.org/petstore/internal/models"
)

/*
Authenticate determines if a hashed version of plain secret exists.
*/
func Authenticate(w http.ResponseWriter, r *http.Request) {
	var respJSON []byte
	var auth models.AuthRequest
	decoder := json.NewDecoder(r.Body)
	err := decoder.Decode(&auth)

	if err != nil {
		respJSON, _ = ra.Build(ra.StatusError, err.Error(), "")
		w.Write(respJSON)
		return
	}

	if valid, value := ta.SecretIsValid([]byte(auth.Secret)); valid {
		respJSON, _ = ra.Build(ra.StatusOk, "Authentication successfull.", value)

	} else {
		respJSON, _ = ra.Build(ra.StatusInvalid, "Authentication failed.", "")
	}

	w.Write(respJSON)
}

/*
ValidToken determines if a hashed token is valid.
*/
func ValidToken(w http.ResponseWriter, r *http.Request) {
	var respJSON []byte
	var token models.TokenRequest
	decoder := json.NewDecoder(r.Body)
	err := decoder.Decode(&token)

	if err != nil {
		respJSON, _ = ra.Build(ra.StatusError, err.Error(), "")
		w.Write(respJSON)
		return
	}

	if valid, _ := ta.IsValid((token.Token)); valid {
		respJSON, _ = ra.Build(ra.StatusOk, "Token is valid.", "")
	} else {
		respJSON, _ = ra.Build(ra.StatusInvalid, "Invalid token supplied.", "")
	}

	w.Write(respJSON)
}

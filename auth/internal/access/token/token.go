package token

import (
	"log"

	"bitbucket.org/petstore/internal/models"
	"bitbucket.org/petstore/internal/utils"
)

// Store of all our tokens in memory.
var tokens []*models.Token

/*
NewToken creates a new token in the token collection.
*/
func NewToken(plainValue string) {
	hashed := utils.HashPlain([]byte(plainValue))
	tokens = append(tokens, &models.Token{ID: int64(len(tokens) + 1), Hash: hashed, Active: true})
}

/*
SecretIsValid if a secret exists in the collection of tokens.
*/
func SecretIsValid(token []byte) (bool, string) {
	for _, t := range tokens {
		if utils.HashMatches(t.Hash, token) && t.Active {
			return true, t.Hash
		}
	}

	return false, ""
}

/*
IsValid if a token exists in the collection of tokens.
*/
func IsValid(token string) (bool, string) {
	for _, t := range tokens {
		if t.Hash == token {
			return true, t.Hash
		}
	}

	return false, ""
}

/*
PrintTokens useful for getting a quick dump of the tokens stores inside access.
*/
func PrintTokens() {
	log.SetFlags(0)
	log.Printf("Log: Current Tokens \n---------------------------")
	for _, token := range tokens {
		log.Printf("%d  |  %s  | %t", token.ID, token.Hash, token.Active)
	}
}

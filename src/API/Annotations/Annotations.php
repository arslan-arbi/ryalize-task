<?php
namespace App\API\Annotations;

use OpenApi\Annotations as OA;

/**
 * @OA\Info(title="API Docs", version="v1")
 */

/**
 * @OA\Server(url=L5_SWAGGER_CONST_HOST)
 */

/**
 * @OA\SecurityScheme(securityScheme="AuthorizationToken", description="Account identification", type="apiKey", in="header", name="X-Api-Token")
 */

/**
 * @OA\SecurityScheme(securityScheme="AdminAuthorizationToken", description="Admin Account identification", type="apiKey", in="header", name="X-Admin-Token")
 */

/**
 * @OA\Post(path="/v1/login", tags={"Auth"}, summary="Login with valid credentials", operationId="login",
 *     @OA\RequestBody(required=true, @OA\MediaType(mediaType="application/json", @OA\Schema(
 *      @OA\Property(property="email", type="string"),
 *      @OA\Property(property="password", type="string")
 *     ))),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized")
 * )
 **/

/**
 * @OA\Post(path="/v1/register", tags={"Auth"}, summary="Register user", operationId="register",
 *     @OA\RequestBody(required=true, @OA\MediaType(mediaType="application/json", @OA\Schema(
 *      @OA\Property(property="name", type="string"),
 *      @OA\Property(property="email", type="string"),
 *      @OA\Property(property="password", type="string"),
 *      @OA\Property(property="confirmPassword", type="string")
 *     ))),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request")
 *)
 **/

/**
 * @OA\Post(path="/v1/forgotPassword", tags={"Auth"}, summary="Forgot password", operationId="forgotPassword",
 *     @OA\RequestBody(required=true, @OA\MediaType(mediaType="application/json", @OA\Schema(
 *      @OA\Property(property="email", type="string")
 *     ))),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Post(path="/v1/reset", tags={"Auth"}, summary="Reset password", operationId="resetPassword",
 *     @OA\Parameter(name="resetToken", in="query", required=true, @OA\Schema(type="string")),
 *     @OA\RequestBody(required=true, @OA\MediaType(mediaType="application/json", @OA\Schema(
 *      @OA\Property(property="password", type="string"),
 *      @OA\Property(property="confirmPassword", type="string")
 *     ))),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=403, description="Forbidden")
 *)
 **/

/**
 * @OA\Get(path="/v1/language", tags={"Language"}, summary="Languages", operationId="language",
 *     @OA\Parameter(name="key", in="query", required=false, @OA\Schema(type="string")),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json"))
 *)
 **/

/**
 * @OA\Get(path="/v1/profile", tags={"Profile"}, operationId="profile", security={{ "AuthorizationToken": {} }},
 *     summary="Profile details",
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Put(path="/v1/profile", tags={"Profile"}, operationId="profileUpdate", security={{ "AuthorizationToken": {} }},
 *     summary="Update profile fields",
 *     @OA\RequestBody(required=false, @OA\MediaType(mediaType="application/json", @OA\Schema(
 *      @OA\Property(property="fullName", type="string"),
 *      @OA\Property(property="passport", type="string"),
 *      @OA\Property(property="passportIssuance", type="string"),
 *      @OA\Property(property="passportExpiry", type="string"),
 *      @OA\Property(property="phone", type="string"),
 *      @OA\Property(property="nationality", type="string"),
 *      @OA\Property(property="birthDate", type="string"),
 *      @OA\Property(property="gender", type="string"),
 *      @OA\Property(property="maritalStatus", type="string"),
 *      @OA\Property(property="address", type="string"),
 *      @OA\Property(property="avatar", type="string"),
 *      @OA\Property(property="motherName", type="string"),
 *      @OA\Property(property="fatherName", type="string"),
 *      @OA\Property(property="residenceCountry", type="string"),
 *     ))),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Patch(path="/v1/profile", tags={"Profile"}, operationId="profileSpecificFieldUpdate", security={{ "AuthorizationToken": {} }},
 *     summary="Update Specific profile fields",
 *     @OA\RequestBody(required=false, @OA\MediaType(mediaType="application/json", @OA\Schema(
 *      @OA\Property(property="fullName", type="string"),
 *      @OA\Property(property="passport", type="string"),
 *      @OA\Property(property="passportIssuance", type="string"),
 *      @OA\Property(property="passportExpiry", type="string"),
 *      @OA\Property(property="phone", type="string"),
 *      @OA\Property(property="nationality", type="string"),
 *      @OA\Property(property="birthDate", type="string"),
 *      @OA\Property(property="gender", type="string"),
 *      @OA\Property(property="maritalStatus", type="string"),
 *      @OA\Property(property="address", type="string"),
 *      @OA\Property(property="avatar", type="string"),
 *      @OA\Property(property="motherName", type="string"),
 *      @OA\Property(property="fatherName", type="string"),
 *      @OA\Property(property="residenceCountry", type="string"),
 *     ))),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Get(path="/v1/countries", tags={"Countries"}, operationId="countries", summary="List of all countries",
 *     @OA\Parameter(name="countryId", in="query", required=false, @OA\Schema(type="string")),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Post(path="/v1/country", tags={"Countries"}, operationId="countryCreate", security={{ "AdminAuthorizationToken": {} }},
 *     summary="Add a new country",
 *     @OA\RequestBody(required=true, @OA\MediaType(mediaType="application/json", @OA\Schema(
 *      @OA\Property(property="countryName", type="string"),
 *      @OA\Property(property="arabicCountryName", type="string"),
 *      @OA\Property(property="countryStatus", type="string"),
 *      @OA\Property(property="images", type="array", @OA\Items(type="string")),
 *     ))),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized")
 *)
 **/

/**
 * @OA\Put(path="/v1/country", tags={"Countries"}, operationId="countryUpdate", security={{ "AdminAuthorizationToken": {} }},
 *     summary="Update country fields",
 *     @OA\Parameter(name="countryId", in="query", required=true, @OA\Schema(type="string")),
 *     @OA\RequestBody(required=false, @OA\MediaType(mediaType="application/json", @OA\Schema(
 *      @OA\Property(property="countryName", type="string"),
 *      @OA\Property(property="arabicCountryName", type="string"),
 *      @OA\Property(property="countryStatus", type="string"),
 *      @OA\Property(property="images", type="array", @OA\Items(type="string")),
 *     ))),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized")
 *)
 **/

/**
 * @OA\Get(path="/v1/universities", tags={"Universities"}, operationId="universities", summary="List of universities",
 *     @OA\Parameter(name="universityId", in="query", required=false, @OA\Schema(type="string")),
 *     @OA\Parameter(name="countryId", in="query", required=false, @OA\Schema(type="string")),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Post(path="/v1/university", tags={"Universities"}, operationId="universityCreate", security={{ "AdminAuthorizationToken": {} }},
 *     summary="Add a new university",
 *     @OA\RequestBody(required=true, @OA\MediaType(mediaType="multipart/form-data", @OA\Schema(
 *      required={"countryId", "universityName", "email", "departmentList"},
 *      @OA\Property(property="countryId", type="string"),
 *      @OA\Property(property="universityName", type="string"),
 *      @OA\Property(property="arabicUniversityName", type="string"),
 *      @OA\Property(property="email", type="string"),
 *      @OA\Property(property="url", type="string"),
 *      @OA\Property(property="phone", type="string"),
 *      @OA\Property(property="establishedDate", type="string"),
 *      @OA\Property(property="type", type="string"),
 *      @OA\Property(property="city", type="string"),
 *      @OA\Property(property="information", type="string"),
 *      @OA\Property(property="status", type="string"),
 *      @OA\Property(property="departmentList", type="file", @OA\Items(type="string", format="binary")),
 *      @OA\Property(property="images[]", type="array", @OA\Items(type="string")),
 *     ))),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Put(path="/v1/university", tags={"Universities"}, operationId="universityUpdate", security={{ "AdminAuthorizationToken": {} }},
 *     summary="Update university fields",
 *     @OA\Parameter(name="universityId", in="query", required=true, @OA\Schema(type="string")),
 *     @OA\RequestBody(required=false, @OA\MediaType(mediaType="application/json", @OA\Schema(
 *      @OA\Property(property="universityName", type="string"),
 *      @OA\Property(property="arabicUniversityName", type="string"),
 *      @OA\Property(property="email", type="string"),
 *      @OA\Property(property="url", type="string"),
 *      @OA\Property(property="phone", type="string"),
 *      @OA\Property(property="establishedDate", type="string"),
 *      @OA\Property(property="type", type="string"),
 *      @OA\Property(property="city", type="string"),
 *      @OA\Property(property="information", type="string"),
 *      @OA\Property(property="status", type="string"),
 *      @OA\Property(property="images", type="array", @OA\Items(type="string")),
 *     ))),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Get(path="/v1/favoriteUniversities", tags={"Universities"}, operationId="universityFavorite", security={{ "AuthorizationToken": {} }},
 *     summary="List of all favorite universities",
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Post(path="/v1/favoriteUniversity", tags={"Universities"}, operationId="universityFavoriteAdd", security={{ "AuthorizationToken": {} }},
 *     summary="Add university to favorites",
 *     @OA\Parameter(name="universityId", in="query", required=true, @OA\Schema(type="string")),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

 /**
 * @OA\Delete(path="/v1/favoriteUniversity", tags={"Universities"}, operationId="universityFavoriteDelete", security={{ "AuthorizationToken": {} }},
 *     summary="Delete university to favorites",
 *     @OA\Parameter(name="universityId", in="query", required=true, @OA\Schema(type="string")),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Get(path="/v1/universityReviews", tags={"Universities"}, operationId="universityReviews", summary="List of all reviews for universities",
 *     @OA\Parameter(name="universityId", in="query", required=false, @OA\Schema(type="string")),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Post(path="/v1/universityReviews", tags={"Universities"}, operationId="universityReviewsAdd", security={{ "AuthorizationToken": {} }},
 *     summary="Add review to university",
 *     @OA\Parameter(name="universityId", in="query", required=true, @OA\Schema(type="string")),
 *     @OA\RequestBody(required=true, @OA\MediaType(mediaType="application/json", @OA\Schema(
 *      @OA\Property(property="rating", type="integer"),
 *      @OA\Property(property="review", type="string"),
 *     ))),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Get(path="/v1/departments", tags={"Departments"}, operationId="departments", summary="List of departments",
 *     @OA\Parameter(name="universityId", in="query", required=false, @OA\Schema(type="string")),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Post(path="/v1/department", tags={"Departments"}, operationId="departmentAdd", security={{ "AdminAuthorizationToken": {} }},
 *     summary="Add a new department",
 *     @OA\Parameter(name="universityId", in="query", required=true, @OA\Schema(type="string")),
 *     @OA\RequestBody(required=true, @OA\MediaType(mediaType="application/json", @OA\Schema(
 *      @OA\Property(property="departmentName", type="string"),
 *      @OA\Property(property="arabicDepartmentName", type="string"),
 *      @OA\Property(property="degree", type="array", @OA\Items(type="string")),
 *      @OA\Property(property="language", type="array", @OA\Items(type="string")),
 *      @OA\Property(property="studyYears", type="string"),
 *      @OA\Property(property="feesBeforeDiscount", type="string"),
 *      @OA\Property(property="feesAfterDiscount", type="string")
 *     ))),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Put(path="/v1/department", tags={"Departments"}, operationId="departmentUpdate", security={{ "AdminAuthorizationToken": {} }},
 *     summary="Update department fields",
 *     @OA\Parameter(name="departmentId", in="query", required=true, @OA\Schema(type="string")),
 *     @OA\RequestBody(required=true, @OA\MediaType(mediaType="application/json", @OA\Schema(
 *      @OA\Property(property="departmentName", type="string"),
 *      @OA\Property(property="arabicDepartmentName", type="string"),
 *      @OA\Property(property="degree", type="array", @OA\Items(type="string")),
 *      @OA\Property(property="language", type="array", @OA\Items(type="string")),
 *      @OA\Property(property="studyYears", type="string"),
 *      @OA\Property(property="feesBeforeDiscount", type="string"),
 *      @OA\Property(property="feesAfterDiscount", type="string")
 *     ))),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Get(path="/v1/news", tags={"Departments"}, operationId="departmentNewsbyId", summary="Get department news by Id",
 *     @OA\Parameter(name="newsId", in="query", required=true, @OA\Schema(type="string")),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Post(path="/v1/departmentNews", tags={"Departments"}, operationId="departmentNewsAdd", security={{ "AuthorizationToken": {} }},
 *     summary="Add news to department",
 *     @OA\Parameter(name="departmentId", in="query", required=true, @OA\Schema(type="string")),
 *     @OA\RequestBody(required=true, @OA\MediaType(mediaType="application/json", @OA\Schema(
 *      @OA\Property(property="newsTitle", type="string"),
 *      @OA\Property(property="news", type="string")
 *     ))),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Put(path="/v1/departmentNews", tags={"Departments"}, operationId="departmentNewsUpdate", security={{ "AuthorizationToken": {} }},
 *     summary="Update department news",
 *     @OA\Parameter(name="newsId", in="query", required=true, @OA\Schema(type="string")),
 *     @OA\RequestBody(required=false, @OA\MediaType(mediaType="application/json", @OA\Schema(
 *      @OA\Property(property="newsTitle", type="string"),
 *      @OA\Property(property="news", type="string")
 *     ))),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Get(path="/v1/departmentArticle", tags={"Departments"}, operationId="departmentArticle", summary="List of department articles",
 *     @OA\Parameter(name="departmentId", in="query", required=false, @OA\Schema(type="string")),
 *     @OA\Parameter(name="countryId", in="query", required=false, @OA\Schema(type="string")),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

 /**
 * @OA\Get(path="/v1/article", tags={"Departments"}, operationId="departmentArticlebyId", summary="Get department article by Id",
 *     @OA\Parameter(name="articleId", in="query", required=false, @OA\Schema(type="string")),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Post(path="/v1/departmentArticle", tags={"Departments"}, operationId="departmentArticleAdd", security={{ "AuthorizationToken": {} }},
 *     summary="Add articles to department",
 *     @OA\Parameter(name="departmentId", in="query", required=true, @OA\Schema(type="string")),
 *     @OA\RequestBody(required=true, @OA\MediaType(mediaType="application/json", @OA\Schema(
 *      @OA\Property(property="articleTitle", type="string"),
 *      @OA\Property(property="article", type="string")
 *     ))),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Put(path="/v1/departmentArticle", tags={"Departments"}, operationId="departmentArticleUpdate", security={{ "AuthorizationToken": {} }},
 *     summary="Update department articles",
 *     @OA\Parameter(name="articleId", in="query", required=true, @OA\Schema(type="string")),
 *     @OA\RequestBody(required=false, @OA\MediaType(mediaType="application/json", @OA\Schema(
 *      @OA\Property(property="articleTitle", type="string"),
 *      @OA\Property(property="article", type="string")
 *     ))),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Get(path="/v1/studentApplications", tags={"StudentApplications"}, operationId="studentApplications", security={{ "AuthorizationToken": {} }},
 *     summary="List of applications",
 *     @OA\Parameter(name="applicationId", in="query", required=false, @OA\Schema(type="string")),
 *     @OA\Parameter(name="programId", in="query", required=false, @OA\Schema(type="string")),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Post(path="/v1/studentApplications", tags={"StudentApplications"}, operationId="studentApplicationsAdd", security={{ "AuthorizationToken": {} }},
 *     summary="Add a new application",
 *     @OA\RequestBody(required=true, @OA\MediaType(mediaType="application/json", @OA\Schema(
 *      @OA\Property(property="universityName", type="string"),
 *      @OA\Property(property="departmentName", type="string"),
 *      @OA\Property(property="countryName", type="string"),
 *      @OA\Property(property="degreeTitle", type="string"),
 *      @OA\Property(property="program", type="object",
 *          @OA\Property(property="programId", type="string"),
 *          @OA\Property(property="title", type="string"),
 *          @OA\Property(property="schoolName", type="string"),
 *          @OA\Property(property="schoolLogo", type="string"),
 *          @OA\Property(property="officialTuition", type="string"),
 *          @OA\Property(property="schoolProfileUrl", type="string"),
 *          @OA\Property(property="discountedTuition", type="string"),
 *          @OA\Property(property="activeApps", type="boolean"),
 *          @OA\Property(property="tuitionType", type="string"),
 *          @OA\Property(property="countryName", type="string")
 *      ),
 *      @OA\Property(property="attachments", type="object",
 *          @OA\Property(property="passport", type="string"),
 *          @OA\Property(property="diploma", type="string"),
 *          @OA\Property(property="transcript", type="string"),
 *          @OA\Property(property="motivationLetter", type="string"),
 *          @OA\Property(property="languageCertificate", type="string"),
 *          @OA\Property(property="others", type="array", @OA\Items(type="string")),
 *      )
 *     ))),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

/**
 * @OA\Post(path="/v1/files", tags={"Files"}, operationId="fileUpload", summary="Upload file",
 *     @OA\Parameter(name="source", in="query", required=false, @OA\Schema(type="string")),
 *     @OA\RequestBody(required=true, @OA\MediaType(mediaType="multipart/form-data", @OA\Schema(
 *      @OA\Property(property="file", type="file", @OA\Items(type="string", format="binary"))
 *     ))),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request")
 *)
 **/

 /**
 * @OA\Get(path="/v1/notifications", tags={"Notifications"}, operationId="notifications", summary="List of notifications",
 *     @OA\Parameter(name="limit", in="query", required=false, @OA\Schema(type="string")),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

 /**
 * @OA\Get(path="/v1/videos", tags={"Videos"}, operationId="videos", summary="List of videos",
 *     @OA\Parameter(name="countryId", in="query", required=false, @OA\Schema(type="string")),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/

 /**
 * @OA\Get(path="/v1/alldata", tags={"All Data"}, operationId="alldata", summary="It will return all the data of the countries, news, articles videos and notification module",
 *     @OA\Parameter(name="countries", in="query", required=false, @OA\Schema(type="integer")),
 *     @OA\Parameter(name="universities", in="query", required=false, @OA\Schema(type="integer")),
 *     @OA\Parameter(name="articles", in="query", required=false, @OA\Schema(type="integer")),
 *     @OA\Parameter(name="news", in="query", required=false, @OA\Schema(type="integer")),
 *     @OA\Parameter(name="videos", in="query", required=false, @OA\Schema(type="integer")),
 *     @OA\Parameter(name="notifications", in="query", required=false, @OA\Schema(type="integer")),
 *     @OA\Response(response=200, description="Success", @OA\MediaType(mediaType="application/json")),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=404, description="Not Found")
 *)
 **/ 
class Annotations
{

}

<template>
    <v-stepper v-model="e6" vertical color="brown"  style="height:100vh">
        <v-stepper-step :complete="e6 > 1" step="1">
            Email Address
        </v-stepper-step>

        <v-stepper-content step="1">
            <div class="mb-12 align-center text-center" height="200px">
                <br />
                <br />
                <v-form ref="form" v-model="valid" lazy-validation>
                    <v-text-field
                        v-model="email"
                        :rules="emailRules"
                        label="E-mail"
                        required
                    ></v-text-field>
                </v-form>
            </div>
            <v-btn
                class="text-white"
                color="brown"
                @click="validate"
                :loading="loading"
            >
                Continue
            </v-btn>
        </v-stepper-content>

        <v-stepper-step :complete="e6 > 2" step="2">
            OTP Request
        </v-stepper-step>

        <v-stepper-content step="2">
            <div class="mb-12" height="200px">
                <br /><br />
                <div class="ma-auto position-relative" style="max-width: 300px">
                    <v-otp-input
                        v-model="otp"
                        :disabled="loading"
                        @finish="onFinish"
                    ></v-otp-input>
                    <v-overlay absolute :value="loading">
                        <v-progress-circular
                            indeterminate
                            color="primary"
                        ></v-progress-circular>
                    </v-overlay>
                </div>
                <div class="text--caption">Type or copy/paste.</div>

                <v-snackbar
                    v-model="snackbar"
                    :color="snackbarColor"
                    :timeout="2000"
                >
                    {{ text }}
                </v-snackbar>
            </div>
        </v-stepper-content>

        <v-stepper-step :complete="e6 > 3" step="3">
            Registration Form
        </v-stepper-step>

        <v-stepper-content step="3">
            <div class="mb-12" height="300px">
                <br /><br />
                <v-form ref="form2" v-model="valid2" lazy-validation>
                <p>Upload prof of document.</p>
                    <v-file-input
                        v-model="documents"
                        :rules="documentsRules"
                        small-chips
                        multiple
                        required
                        label="Proof Documents"
                    ></v-file-input>

                    <v-text-field
                        v-model="appName"
                        :rules="appNameRules"
                        label="Store Name"
                        required
                    ></v-text-field>
                    <v-text-field
                        v-model="owner"
                        :rules="ownerRules"
                        label="Proprietor"
                        required
                    ></v-text-field>

                    <v-text-field
                        v-model="username"
                        :rules="usernameRules"
                        label="Username"
                        required
                    ></v-text-field>

                    <v-text-field
                        v-model="password"
                        :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                        :rules="[rules.required, rules.min]"
                        :type="show1 ? 'text' : 'password'"
                        name="input-10-1"
                        label="Enter your password!"
                        hint="At least 8 characters"
                        counter
                        @click:append="show1 = !show1"
                    ></v-text-field>
                </v-form>
            </div>
            <v-btn
                class="text-white"
                color="brown"
                :loading="loading"
                @click="validate2"
            >
                Continue
            </v-btn>
            <br />
            <br />
        </v-stepper-content>
    </v-stepper>
</template>

<script>
export default {
    data() {
        return {
            appName: "",
            appNameRules: [(v) => !!v || "Store name is required"],
            documents: [],
            documentsRules: [(v) => !!v || "Documents is required"],
            username: [],
            usernameRules: [(v) => !!v || "Username is required"],
            owner: [],
            ownerRules: [(v) => !!v || "Proprietor is required"],
            show1: false,
            password: "",
            rules: {
                required: (value) => !!value || "Required.",
                min: (v) => v.length >= 8 || "Min 8 characters",
            },
            snackbar: false,
            snackbarColor: "default",
            otp: "",
            text: "",
            expectedOtp: "133707",
            loading: false,
            valid: "",
            valid2: "",
            e6: 1,
            email: "",
            emailRules: [
                (v) => !!v || "E-mail is required",
                (v) => /.+@.+\..+/.test(v) || "E-mail must be valid",
            ],
        };
    },
    methods: {
        onFinish(rsp) {
            this.loading = true;
            axios
                .post("/otp_submit", {
                    otp: parseInt(rsp),
                })
                .then((res) => {
                    console.log("waa", res.data.otp);
                    if (res.data.status === true) {
                        this.loading = false;
                        this.snackbarColor = "success";
                        this.snackbar = true;
                        this.text = `OTP success`;
                        this.e6 = 3;
                    } else {
                        this.loading = false;
                        this.snackbarColor = "error";
                        this.snackbar = true;
                        this.text = `OTP incorrect`;
                    }
                })
                .catch((err) => {});
        },
        validate(e) {
            e.preventDefault();
            this.loading = true;
            this.$refs.form.validate();
            if (this.$refs.form.validate()) {
                axios
                    .post("/sendotp", {
                        email: this.email,
                    })
                    .then((res) => {
                        this.loading = false;
                        this.e6 = 2;
                    })
                    .catch((err) => {
                        this.loading = false;
                    });
            } else {
                this.loading = false;
            }
        },
        validate2() {
            this.loading = true;
            this.$refs.form2.validate();

            const fd = new FormData();
            fd.append("email", this.email);
            fd.append("password", this.password);
            fd.append("username", this.username);
            fd.append("storename", this.appName);
            fd.append("owner", this.owner);
            fd.append("count", this.documents.length);
            for (var i = 0; i < this.documents.length; i++) {
                fd.append("documents" + i, this.documents[i]);
            }
            if (this.$refs.form2.validate() === true) {
                axios
                    .post("/add_user", fd)
                    .then((res) => {
                        if (res.data.status === "success") {
                            this.snackbarColor = "success";
                            this.snackbar = true;
                            this.text = `Registration Success`;
                            this.loading = false;
                            this.$router.push({ path: "/" });
                        } else {
                            this.snackbarColor = "error";
                            this.snackbar = true;
                            this.loading = false;
                            this.text = `Store Name is exist!`;
                        }
                    })
                    .catch((err) => {
                        this.snackbarColor = "error";
                        this.snackbar = true;
                        this.loading = false;
                        this.text = `You can't proceed the registration, mail is exist!`;
                    });
            } else {
                this.snackbarColor = "error";
                this.snackbar = true;
                this.loading = false;
                this.text = `All Requiments is required!`;
            }
        },
        reset() {
            this.$refs.form.reset();
        },
        resetValidation() {
            this.$refs.form.resetValidation();
        },
    },
};
</script>

<style>
span.v-stepper__step__step.primary {
    background-color: brown !important;
}
</style>
